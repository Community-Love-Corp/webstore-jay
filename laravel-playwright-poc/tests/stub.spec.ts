import { test, expect } from '@playwright/test'; 

test('stub the user endpoint', async ({ page }) => {
    // 1. Intercept the network request
    await page.route('**/api/user', async (route) => {
        await route.fulfill({
            status: 200,
            contentType: 'application/json',
            body: JSON.stringify([
                { id: 1, name: 'Ada Lovelace', email: 'ada@gmail.com'},
                { id: 2, name: 'Alan Turing', email: 'alan@gmail.com'}    
            ]),
        });
    }); 
    
    // 2. Trigger the navigation context
    const response = await page.goto('/api/user');
    
    // 3. FIX: Assert without the incorrect await prefix
    expect(response?.status()).toBe(200);
    
    // 4. Extract data cleanly
    let json = await response!.json();
    expect(json[0]).toHaveProperty('id');
    expect(json[0].id).toBe(1); 
}); 

test('fulfill with json shortcut', async ({ page }) => {
    await page.route('**/api/user', async (route) => {
		await route.fulfill({
			json: [{ id: 1, name: 'Ada Lovelace', email: 'ada@gmail.com'}]
        });
    }); 
    
	const response = await page.goto('/api/user');
	
	// 3. FIX: Assert without the incorrect await prefix
	expect(response?.status()).toBe(200);

	let json = await response?.json();
	expect(json[0]).toHaveProperty('name');
	expect(json[0].name).toContain('Ada'); 
});
