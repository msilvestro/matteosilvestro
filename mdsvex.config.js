import { defineMDSveXConfig as defineConfig } from "mdsvex";

const config = defineConfig({
  "extensions": [".svelte.md", ".md", ".svx"],

  "smartypants": {
    "dashes": "oldschool"
  },

  "remarkPlugins": [],
  "rehypePlugins": [],

  "layout": "./src/layout.svelte"
});

export default config;