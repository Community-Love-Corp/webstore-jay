import { test, expect } from '@playwright/test';

test("homepage loads", async ({ page }) => {
	await page.goto('http://127.0.0.1:8000');
	await expect(page.locator("h1")).toContainText("Shop");
});

test("login form works", async ( {page} ) => {
	await page.goto("http://127.0.0.1:8000");
	//if email input element had id=email, then this would work:
	//await page.fill("#email", "user@example.com");
	await page.fill('input[name="email"]', 'user@example.com');
	await page.fill('input[name="password"]', 'password');
	const loginButton = page.getByRole("button", { name: "Login"} );
	await loginButton.click();
	
//	await page.fill('input[name="password"]', 'password');

//	await page.click('button[type="submit"]');

	await expect(page).toHaveURL('http://127.0.0.1:8000/dashboard');
});