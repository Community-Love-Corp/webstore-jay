import { test, expect } from '@playwright/test';

test('Homepage visual snapshot', async ({ page }) => {
	await page.goto('http://127.0.0.1:8000');
	expect (await page.screenshot()).toMatchSnapshot('homepage.png');
});