import kirby from 'vite-plugin-kirby';
import fs from 'fs';
import {homedir} from 'os';
import {resolve} from 'path';

let host = 'michael-scheurich.test';

export default ({mode}) => ({
  root: 'src',
  base: mode === 'development' ? '/' : '/dist/',

  build: {
    outDir: resolve(process.cwd(), 'public/dist'),
    emptyOutDir: true,
    rollupOptions: {input: resolve(process.cwd(), 'src/index.js')},
  },

  server: detectServerConfig(host),

  plugins: [kirby()],
})

function detectServerConfig(host) {
  let keyPath = resolve(homedir(), `.config/valet/Certificates/${host}.key`);
  let certificatePath = resolve(homedir(),
      `.config/valet/Certificates/${host}.crt`);

  if (!fs.existsSync(keyPath)) {
    return {};
  }

  if (!fs.existsSync(certificatePath)) {
    return {};
  }

  return {
    hmr: {host},
    host,
    https: {
      key: fs.readFileSync(keyPath),
      cert: fs.readFileSync(certificatePath),
    },
  };
}