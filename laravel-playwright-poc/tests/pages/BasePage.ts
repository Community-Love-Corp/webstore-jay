// tests/pages/BasePage.ts

import { Page, Locator } from '@playwright/test';
export abstract class BasePage {
	protected page: Page;

	constructor (page: Page){
		this.page = page;

	}
	// Promise are designed for asynchronous operation, 
	// where the value is not known at the start (mdn__, 2015).
	// Note: if page.getURL() returns '/login', then this method navigates 
	// to http://127.0.0.1:8000/login when test run locally.  
	async goto(): Promise<void> { 
		await this.page.goto(this.url);
	}
	abstract get url(): string;
	// Common elements across all pages
	get header(): Locator {
		return this.page.getByRole('banner');
	}
	get footer(): Locator{
		return this.page.getByRole('contentinfo');
	}
	// Common actions
	async waitForPageLoad(): Promise<void> {
		await this.page.waitForLoadState('networkidle');
	}

}
/*
 *References
 *----------
 *1. mdn__.(2015). Web>JavaScript>Guide>Using promises. 
 *Source: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Guide/Using_promises. Last Accessed: 17 July 2026.
 */