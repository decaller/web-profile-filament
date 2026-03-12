import { defineConfig } from '@playwright/test';
import * as dotenv from 'dotenv';
import * as fs from 'fs';

const envFiles = ['.env.e2e', '.env'];
for (const envFile of envFiles) {
  if (fs.existsSync(envFile)) {
    dotenv.config({ path: envFile, override: false });
  }
}

const baseURL =
  process.env.PLAYWRIGHT_BASE_URL ??
  process.env.APP_URL ??
  'http://127.0.0.1:8001';

export default defineConfig({
  testDir: 'tests/playwright',
  timeout: 30_000,
  expect: {
    timeout: 10_000,
  },
  use: {
    baseURL,
    headless: true,
    ignoreHTTPSErrors: true,
  },
});
