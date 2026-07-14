import { expect, test as base, Page } from '@playwright/test';
import { LoginPage } from '../pages/LoginPage'; 
import { DashboardPage } from '../pages/DashboardPage';

type MyFixtures = {
	loggedInPage: Page; 
	dashboardPage: DashboardPage;
}; 

export const test = base.extend<MyFixtures>({
	// 1. Define loggedInPage first so it can handle the authentication flow
	loggedInPage: async ({ page }, use) => {
		const loginPage = new LoginPage(page);
		const dashboardPage = new DashboardPage(page);
		
		await loginPage.goto();
		await loginPage.login('user@example.com', 'password');
		await expect(dashboardPage.welcomeMessage).toBeVisible();
		
		await use(page);
		//Optional : clean up after the test finishes.
		//await page.evaluate(() => localStorage.clear());
	},

	// 2. Change { page } to { loggedInPage } so it reuses the authenticated session
	dashboardPage: async ({ loggedInPage }, use) => {
		// Pass the already-logged-in page to the DashboardPage constructor
		await use(new DashboardPage(loggedInPage));
	},
});

export { expect } from '@playwright/test';
