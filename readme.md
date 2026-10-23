# bedram

## Deployment

Deployments use [Laravel Envoy](https://laravel.com/docs/10.x/envoy) via `Envoy.blade.php`.

Install Envoy globally (it is not a project dependency):

```bash
composer global require laravel/envoy
```

Configure the target in your local `.env` or as shell environment variables (shell values win).
The local `.env` is only read when `vendor/` exists, so run `composer install` first. Without it, export the variables in your shell:

```bash
export DEPLOY_HOST=user@your-server-ip DEPLOY_PATH=/home/forge/your-site
```

| Variable            | Default                    | Description                                       |
|---------------------|----------------------------|---------------------------------------------------|
| `DEPLOY_HOST`       | required                   | SSH target, e.g. `user@your-server-ip`            |
| `DEPLOY_PATH`       | required                   | App directory on the server, e.g. `/home/forge/your-site` |
| `DEPLOY_BRANCH`     | `master`                   | Branch to deploy                                  |
| `DEPLOY_REPO`       | local `origin` remote URL  | Repository cloned by `init`                       |
| `DEPLOY_PHP`        | `php8.5`                   | PHP binary for artisan and composer               |
| `DEPLOY_RELOAD_FPM` | `false`                    | `true` reloads `<DEPLOY_PHP>-fpm` via `sudo`      |

Envoy stops with an error if `DEPLOY_HOST` or `DEPLOY_PATH` is missing.

Run:

```bash
envoy run init     # first time only: clones the repo into DEPLOY_PATH (refuses if it exists)
envoy run deploy   # down → pull → composer → yarn build + front:build → migrate → cache → queue:restart → [fpm reload] → up
envoy run health   # current commit and Laravel version on the server
```

Notes:

- `deploy` checks that `DEPLOY_PATH` holds a Laravel app with a `.env` before taking anything down.
- Both bundles (`build` → `public/build/admin`, `front:build` → `public/build/front`) are built on the server on every deploy with `corepack yarn`, which comes with Node, so no global yarn is needed. `public/build` is not committed.
- If a step fails, the app is brought back up (`artisan up`) and the deploy stops. Fix the issue and re-run `envoy run deploy`.
  Don't pass `--continue` to `deploy`, since it continues past failed steps.
- If `build-assets` fails, the site comes back up with the previous build. On the first deploy after `public/build` stopped being tracked, there is no previous build, so pages will be missing their assets until a deploy succeeds.
