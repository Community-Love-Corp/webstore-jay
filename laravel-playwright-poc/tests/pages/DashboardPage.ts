//tests/pages/DashboardPage.ts
import { Page, Locator } from '@playwright/test';
import { BasePage } from './BasePage';
import { Dropdown } from '../components/Dropdown';

export class DashboardPage extends BasePage {
	public profileDropdown: Dropdown;
	constructor(page: Page){
		super(page);
		this.profileDropdown = new Dropdown(page, 'nav');
	}
	get url(): string {
		return '/dashboard';
	}
	//locators
	get welcomeMessage(): Locator {
		//return this.page.getByRole('heading', { name: /Welcome/ });
		return this.page.getByText(/You're logged in!/i);
	}
	get userMenu(): Locator {
		return this.page.getByRole('button', { name: 'User menu' });
	}
	get logoutButton(): Locator {
		return this.page.getByRole('menuitem', { name: 'Logout'});
	}
	get settingsLink(): Locator {
		return this.page.getByRole('link', { name: 'Settings'});
	}
	// Actions
	async logout(): Promise<void> {
		await this.userMenu.click();
		await this.logoutButton.click();    
	}
	async navigateToSettings(): Promise<void>{
		await this.settingsLink.click();
	}
}