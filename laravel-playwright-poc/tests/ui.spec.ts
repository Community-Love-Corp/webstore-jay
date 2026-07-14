import { test, expect } from '@playwright/test';
import dotenv from 'dotenv';
import path from 'path';

// Load Environment variables from .env file
dotenv.config({ path: path.resolve(__dirname, '.env')});
test("homepage loads", async ({ page }) => {
	await page.goto('http://127.0.0.1:8000');
	await expect(page.locator("h1")).toContainText("Shop");
});

test("login form works", async ( {page} ) => {
	await page.goto("/login");
	//if email input element had id=email, then this would work:
	//await page.fill("#email", "user@example.com");
	await page.fill('input[name="email"]', ''+process.env.EMAIL);
	await page.fill('input[name="password"]', ''+process.env.PASSWORD);
	const loginButton = page.getByRole("button", { name: "Log in"} );
	await loginButton.click();
	
//	await page.fill('input[name="password"]', 'password');

//	await page.click('button[type="submit"]');

	//await expect(page).toHaveURL(process.env.BASE_URL+'/dashboard');
	await expect(page.getByText(/You're logged in!/i)).toBeVisible();
});