import kirby from 'vite-plugin-kirby';
import {resolve} from 'path';

const host = 'localhost';

export default ({mode}) => ({
  root: 'src',
  base: mode === 'development' ? '/' : '/dist/',

  build: {
    outDir: resolve(process.cwd(), 'public/dist'),
    emptyOutDir: true,
    rollupOptions: {input: resolve(process.cwd(), 'src/index.js')},
  },

  server: {
    hmr: {host},
    host,
  },

  plugins: [kirby()],
});
