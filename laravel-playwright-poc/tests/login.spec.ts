import { test, expect } from '@playwright/test';

test('Laravel Breeze login works', async ({ page }) => {
  await page.goto('/login');

  await page.fill('input[name="email"]', ''+process.env.EMAIL);
  await page.fill('input[name="password"]', ''+process.env.PASSWORD);

  await page.click('button[type="submit"]');

  await expect(page).toHaveURL('http://127.0.0.1:8000/dashboard');
});