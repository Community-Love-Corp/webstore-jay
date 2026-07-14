 

import { Page, Locator } from '@playwright/test'; 

export class Dropdown { 

	private page: Page; 

	private container: Locator; 

  

	constructor(page: Page, containerSelector: string = 'nav') { 

		this.page = page; 

		// Scope all interactions to the navigation element 

		this.container = page.locator(containerSelector); 

	} 

  /*
	<svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
	                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
	                                </svg>*/
	// Finds the button that toggles the dropdown open/closed 

	get trigger(): Locator {
		// Finds the button role that contains the specific desktop dropdown arrow SVG
		return this.container.getByRole('button').filter({
			has: this.page.locator('svg.fill-current.h-4.w-4')
		});
	}
/*
	get trigger(): Locator {
		// Finds the button role inside the navbar that contains actual text
		return this.container.getByRole('button').filter({ hasText: /[a-zA-Z]/ });
	}
*/

  

	// Finds specific item links inside the open dropdown container 

	item(name: string): Locator { 

		return this.container.getByRole('link', { name: name }); 

	} 

  

	// Complete action helper to open and click an item 

	async select(itemName: string): Promise<void> { 

		await this.trigger.click(); 

		await this.item(itemName).click(); 

	} 

} 

  