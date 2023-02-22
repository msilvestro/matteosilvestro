# Matteo Silvestro's webpage

This is the source code that powers my personal webpage. It is written using
[Svelte](https://svelte.dev).

## Run website

- Install `pnpm` if necessary, then install the website package:
  ```sh
  pnpm install
  ```
- Run the development server with:
  ```sh
  pnpm run dev
  ```
- The website will be available at
  [http://localhost:5173/](http://localhost:5173/).

## Release new version

- Bump version and tag release.
- When pushing to `main` Vercel will automatically deploy.
