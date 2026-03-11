import { test, expect } from '@playwright/test';

const seedUrls = [
  '/',
  '/blogs',
  '/activities',
  '/publications',
  '/testimonials',
  '/about',
  '/registration',
  '/contact',
];

const maxPages = Number.parseInt(process.env.PLAYWRIGHT_MAX_PAGES ?? '200', 10);
const skipPaths = new Set(['/programs', '/admissions']);

const isSkippable = (url: URL) => {
  const path = url.pathname.toLowerCase();

  if (skipPaths.has(path)) return true;
  if (url.protocol !== 'http:' && url.protocol !== 'https:') {
    return true;
  }

  if (path.endsWith('.pdf')) return true;
  if (path.endsWith('.jpg') || path.endsWith('.jpeg') || path.endsWith('.png') || path.endsWith('.webp')) return true;
  if (path.endsWith('.css') || path.endsWith('.js')) return true;

  return false;
};

const normalizeUrl = (url: URL) => {
  url.hash = '';
  url.search = '';
  return url.toString();
};

test('crawl public urls without errors', async ({ page, baseURL }) => {
  if (!baseURL) {
    throw new Error('PLAYWRIGHT_BASE_URL is required.');
  }

  const origin = new URL(baseURL).origin;
  const queue: string[] = [...seedUrls];
  const visited = new Set<string>();

  while (queue.length > 0) {
    if (visited.size >= maxPages) {
      throw new Error(`Crawler exceeded max pages (${maxPages}).`);
    }

    const nextPath = queue.shift();
    if (!nextPath) continue;

    const nextUrl = new URL(nextPath, baseURL);

    if (nextUrl.origin !== origin || isSkippable(nextUrl)) {
      continue;
    }

    const normalized = normalizeUrl(nextUrl);
    if (visited.has(normalized)) {
      continue;
    }

    visited.add(normalized);

    const response = await page.goto(normalized, { waitUntil: 'domcontentloaded' });
    expect(response, `No response for ${normalized}`).not.toBeNull();
    expect(response!.status(), `Bad status for ${normalized}`).toBeLessThan(400);

    const hrefs = await page.$$eval('a[href]', anchors => anchors.map(a => a.getAttribute('href')));
    for (const href of hrefs) {
      if (!href) continue;
      if (href.startsWith('mailto:') || href.startsWith('tel:') || href.startsWith('javascript:')) continue;

      const discovered = new URL(href, baseURL);
      if (discovered.origin !== origin || isSkippable(discovered)) continue;

      const discoveredNormalized = normalizeUrl(discovered);
      if (!visited.has(discoveredNormalized)) {
        queue.push(discoveredNormalized);
      }
    }
  }
});
