# Matteo Silvestro's webpage

This is the source code that powers my personal webpage. It is written using
[Next.js](https://nextjs.org).

## Run website

- Install `yarn` if necessary, then install the website package:
  ```sh
  yarn install
  ```
- Run the development server with:
  ```sh
  yarn dev
  ```
- The website will be available at
  [http://localhost:3000](http://localhost:3000).

## Release new version

- Bump version and tag release (select the desired version):
  ```sh
  yarn version
  ```
- When pushing to `main` Vercel will automatically deploy.
