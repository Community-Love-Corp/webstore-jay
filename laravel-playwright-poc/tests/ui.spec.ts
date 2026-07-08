import { test, expect } from '@playwright/test';

test("homepage loads", async ({ page }) => {
	await page.goto('http://127.0.0.1:8000');
	await expect(page.locator("h1")).toContainText("Shop");
});
