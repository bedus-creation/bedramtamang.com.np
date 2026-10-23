# bedramtamang.com.np

## Frontend assets

Built assets are not committed. `public/build` is git-ignored and built at deploy time:

```bash
yarn install --frozen-lockfile
yarn build        # admin / Inertia bundle -> public/build/admin
yarn front:build  # public site bundle     -> public/build/front
```

Use Node 24 (see `.nvmrc`); Node 22.12+ is also supported. For local development run `yarn dev` or `yarn front:dev`.

Run both builds before `php artisan test`: feature tests render views that need the Vite manifests.
