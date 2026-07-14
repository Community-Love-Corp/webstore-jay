import { test, expect } from '@playwright/test';

test('Homepage visual snapshot', async ({ page }) => {
	await page.goto('/');
	expect (await page.screenshot()).toMatchSnapshot('homepage.png');
});