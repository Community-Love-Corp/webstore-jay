import {test, expect } from '@playwright/test';
import { LoginPage } from '../pages/LoginPage';
import { DashboardPage } from '../pages/DashboardPage';

test.describe('Login functionality', () => {
	test( 'user can login with valid credentials', async ({ page }) =>{
		const loginPage = new LoginPage(page);
		const dashboardPage = new DashboardPage(page);
		await loginPage.goto();
		await loginPage.login('user@example.com','password');
		await expect(dashboardPage.welcomeMessage).toBeVisible();
	});
});