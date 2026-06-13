import { test, expect } from '@playwright/test';

test('Laravel Breeze login works', async ({ page }) => {
  await page.goto('http://127.0.0.1:8000/login');

  await page.fill('input[name="email"]', 'user@example.com');
  await page.fill('input[name="password"]', 'password');

  await page.click('button[type="submit"]');

  await expect(page).toHaveURL('http://127.0.0.1:8000/dashboard');
});