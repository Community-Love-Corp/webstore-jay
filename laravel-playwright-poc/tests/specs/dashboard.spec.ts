import { test, expect } from '../fixtures/fixtures.js';
import { DashboardPage } from '../pages/DashboardPage.js';

// No need to import DashboardPage directly here anymore
test('Verify dashboard modal title', async ({ loggedInPage, dashboardPage }) => {
	// Navigate using the page context
	await loggedInPage.goto('/dashboard');
	
	// Verify Welcome Message
	await expect(dashboardPage.welcomeMessage);
});

test ('Verify user can log out via nav dropdown', async ({ loggedInPage, dashboardPage, page }) => {
	await loggedInPage.goto('/dashboard');	
	await dashboardPage.profileDropdown.select('Log Out');
		
		//Assert succcessful redirect to the login or welcome domain
		await expect(page).toHaveURL(/\/login|\//);
});
