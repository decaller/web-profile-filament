import { test, expect } from '@playwright/test';
import * as fs from 'fs';
import * as path from 'path';

test.describe('Capture Screenshots', () => {
    const screenshotDir = 'screenshots';

    test.beforeAll(async () => {
        if (!fs.existsSync(screenshotDir)) {
            fs.mkdirSync(screenshotDir);
        }
    });

    test('capture home page', async ({ page }) => {
        await page.goto('/');
        await page.screenshot({ path: path.join(screenshotDir, 'home.png'), fullPage: true });
    });

    test('capture admin login and dashboard', async ({ page }) => {
        // Set a larger viewport for better screenshots
        await page.setViewportSize({ width: 1440, height: 900 });

        // Go to login page
        console.log('Navigating to login page...');
        await page.goto('/admin/login');
        await page.waitForLoadState('networkidle');
        await page.screenshot({ path: path.join(screenshotDir, 'admin-login.png') });

        // Login
        console.log('Logging in...');
        await page.fill('input[type="email"]', 'admin@admin.com');
        await page.fill('input[type="password"]', 'password');
        await page.click('button[type="submit"]');

        // Wait for dashboard redirect and filament content
        console.log('Waiting for dashboard...');
        await expect(page).toHaveURL(/\/admin/);
        
        // Wait for Filament's main content area to appear
        const mainContent = page.locator('.fi-main');
        await expect(mainContent).toBeVisible({ timeout: 15000 });
        
        await page.waitForLoadState('networkidle');
        // Extra wait for animations/livewire
        await page.waitForTimeout(2000);
        
        console.log(`Current URL: ${page.url()}`);
        console.log(`Page Title: ${await page.title()}`);

        // Take dashboard screenshot
        await page.screenshot({ path: path.join(screenshotDir, 'admin-dashboard.png'), fullPage: true });

        const openFirstEdit = async () => {
            const firstRow = page.locator('table tbody tr').first();
            await expect(firstRow).toBeVisible();
            const editAction = firstRow.locator(
                'a[aria-label="Edit"], button[aria-label="Edit"], a:has-text("Edit"), button:has-text("Edit")'
            ).first();
            await expect(editAction).toBeVisible();
            await editAction.click();
        };

        // Navigate to Pages
        console.log('Navigating to Pages...');
        await page.goto('/admin/pages');
        await expect(page.locator('.fi-main')).toBeVisible();
        await page.waitForLoadState('networkidle');
        await page.waitForTimeout(1000);
        await page.screenshot({ path: path.join(screenshotDir, 'admin-pages.png'), fullPage: true });

        // Edit first Page
        console.log('Editing first Page...');
        await openFirstEdit();
        await expect(page.locator('.fi-main')).toBeVisible();
        await page.waitForLoadState('networkidle');
        await page.waitForTimeout(1000);
        await page.screenshot({ path: path.join(screenshotDir, 'admin-page-edit.png'), fullPage: true });

        // Back to Pages list
        await page.goto('/admin/pages');

        // Navigate to Publications
        console.log('Navigating to Publications...');
        await page.goto('/admin/publications');
        await expect(page.locator('.fi-main')).toBeVisible();
        await page.waitForLoadState('networkidle');
        await page.waitForTimeout(1000);
        await page.screenshot({ path: path.join(screenshotDir, 'admin-publications.png'), fullPage: true });

        // Edit first Publication
        console.log('Editing first Publication...');
        await openFirstEdit();
        await expect(page.locator('.fi-main')).toBeVisible();
        await page.waitForLoadState('networkidle');
        await page.waitForTimeout(1000);
        await page.screenshot({ path: path.join(screenshotDir, 'admin-publication-edit.png'), fullPage: true });

        // Navigate to Blog Posts
        console.log('Navigating to Blog Posts...');
        await page.goto('/admin/posts');
        await expect(page.locator('.fi-main')).toBeVisible();
        await page.waitForLoadState('networkidle');
        await page.waitForTimeout(1000);
        await page.screenshot({ path: path.join(screenshotDir, 'admin-posts.png'), fullPage: true });

        // Navigate to Settings
        console.log('Navigating to Settings...');
        await page.goto('/admin/settings');
        await expect(page.locator('.fi-main')).toBeVisible();
        await page.waitForLoadState('networkidle');
        await page.waitForTimeout(1000);
        await page.screenshot({ path: path.join(screenshotDir, 'admin-settings.png'), fullPage: true });
    });
});
