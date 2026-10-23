@setup
    if (file_exists(__DIR__.'/vendor/autoload.php')) {
        require __DIR__.'/vendor/autoload.php';
        Dotenv\Dotenv::createImmutable(__DIR__)->safeLoad();
    }

    $env = fn (string $key, ?string $default = null) => ($_ENV[$key] ?? $_SERVER[$key] ?? getenv($key)) ?: $default;

    $host = $env('DEPLOY_HOST');
    $path = $env('DEPLOY_PATH');

    if (! $host || ! $path) {
        throw new Exception('DEPLOY_HOST and DEPLOY_PATH must both be set (shell env or local .env). See .env.example.');
    }

    $path = rtrim($path, '/');
    $branch = $env('DEPLOY_BRANCH', 'master');
    $repo = $env('DEPLOY_REPO', trim((string) shell_exec('git -C '.escapeshellarg(__DIR__).' remote get-url origin 2>/dev/null')));
    $php = $env('DEPLOY_PHP', 'php8.5');
    $reloadFpm = filter_var($env('DEPLOY_RELOAD_FPM', 'false'), FILTER_VALIDATE_BOOLEAN);
    $restartQueue = filter_var($env('DEPLOY_RESTART_QUEUE', 'false'), FILTER_VALIDATE_BOOLEAN);

    // The server's CLI default PHP may differ from $php, so composer is run through $php explicitly.
    $composer = "{$php} \"\$(command -v composer)\"";
    // No global yarn on the server; corepack ships with Node and runs yarn without a global install.
    $yarn = 'COREPACK_ENABLE_DOWNLOAD_PROMPT=0 corepack yarn';
@endsetup

@servers(['web' => $host])

@story('deploy')
    preflight
    maintenance-down
    update-code
    install-dependencies
    build-assets
    migrate
    optimize
    restart-queue
    reload-fpm
    maintenance-up
@endstory

@task('init')
    set -e
    if [ -z "{{ $repo }}" ]; then
        echo "No repository URL: set DEPLOY_REPO or add an origin remote locally." >&2
        exit 1
    fi
    if [ -e "{{ $path }}" ]; then
        echo "{{ $path }} already exists; refusing to clone over it." >&2
        exit 1
    fi
    git clone --branch "{{ $branch }}" "{{ $repo }}" "{{ $path }}"
    echo "Cloned into {{ $path }}. Create {{ $path }}/.env (APP_KEY, DB_*, etc.), then run: envoy run deploy"
@endtask

@task('preflight')
    set -e
    if [ ! -f "{{ $path }}/artisan" ]; then
        echo "No Laravel app at {{ $path }}. Create the site first (e.g. in Forge), or run: envoy run init" >&2
        exit 1
    fi
    if [ ! -f "{{ $path }}/.env" ]; then
        echo "Missing {{ $path }}/.env. Create it before deploying." >&2
        exit 1
    fi
@endtask

@task('maintenance-down')
    set -e
    cd "{{ $path }}"
    {{ $php }} artisan down --retry=60
@endtask

{{-- Envoy stops the story at the first failed task, so every step after `down` brings the app back up before failing. --}}
@task('update-code')
    set -e
    cd "{{ $path }}"
    trap '{{ $php }} artisan up' ERR
    git fetch origin "{{ $branch }}"
    git reset --hard "origin/{{ $branch }}"
@endtask

@task('install-dependencies')
    set -e
    cd "{{ $path }}"
    trap '{{ $php }} artisan up' ERR
    {{ $composer }} install --no-dev --optimize-autoloader --no-interaction
@endtask

@task('build-assets')
    set -e
    cd "{{ $path }}"
    trap '{{ $php }} artisan up' ERR
    {{ $yarn }} install --frozen-lockfile
    {{ $yarn }} build
    {{ $yarn }} front:build
@endtask

@task('migrate')
    set -e
    cd "{{ $path }}"
    trap '{{ $php }} artisan up' ERR
    {{ $php }} artisan migrate --force
    [ -L public/storage ] || {{ $php }} artisan storage:link
@endtask

@task('optimize')
    set -e
    cd "{{ $path }}"
    trap '{{ $php }} artisan up' ERR
    {{ $php }} artisan config:cache
    {{ $php }} artisan route:cache
    {{ $php }} artisan view:cache
@endtask

@task('restart-queue')
    set -e
    cd "{{ $path }}"
    trap '{{ $php }} artisan up' ERR
    @if ($restartQueue)
        {{ $php }} artisan queue:restart
    @else
        echo "Skipping queue:restart (set DEPLOY_RESTART_QUEUE=true to enable)."
    @endif
@endtask

@task('reload-fpm')
    set -e
    cd "{{ $path }}"
    trap '{{ $php }} artisan up' ERR
    @if ($reloadFpm)
        {{-- Pipe an empty line so `sudo -S` doesn't read the rest of this script from stdin. --}}
        echo "" | sudo -S service {{ $php }}-fpm reload
    @else
        echo "Skipping {{ $php }}-fpm reload (set DEPLOY_RELOAD_FPM=true to enable)."
    @endif
@endtask

@task('maintenance-up')
    set -e
    cd "{{ $path }}"
    {{ $php }} artisan up
@endtask

@task('health')
    set -e
    cd "{{ $path }}"
    git log -1 --oneline
    {{ $php }} artisan --version
@endtask
