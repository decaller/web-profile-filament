import { defineConfig } from '@playwright/test';

const baseURL = process.env.PLAYWRIGHT_BASE_URL ?? 'http://127.0.0.1:8001';

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
