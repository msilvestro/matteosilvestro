import { defineMDSveXConfig as defineConfig } from 'mdsvex';
import path from 'path';
import { fileURLToPath } from 'url';

const __dirname = path.dirname(fileURLToPath(import.meta.url));

const config = defineConfig({
  extensions: ['.svelte.md', '.md', '.svx'],

  smartypants: {
    dashes: 'oldschool'
  },

  remarkPlugins: [],
  rehypePlugins: [],

  layout: path.join(__dirname, './src/routes/md-layout.svelte')
});

export default config;
