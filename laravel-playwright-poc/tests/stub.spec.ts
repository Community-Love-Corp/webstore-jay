
/*
 * Author: Jay Sarna
 * Date: 14 July 2026
 * Purpose: Run 'node server.js' to start endpoint on http://127.0.0.1:8001/api/user. 
 * Then run this test, to stub it and verify that it is the stub that is used.
*/

import { test, expect } from '@playwright/test'; 

test('stub the user endpoint', async ({ page }) => {
    await page.route('**/api/user', async (route) => {
        await route.fulfill({
            status: 200,
            contentType: 'application/json',
            body: JSON.stringify([
                { id: 1, name: 'Ada Lovelace', email: 'ada@gmail.com'},
                { id: 2, name: 'Alan Turing', email: 'alan@gmail.com'}    
            ]),
        });
    }); // Fixed: Replaced ) with }
    
    // Fixed: Capture the response in a variable
    const response = await page.goto('http://127.0.0.1:8001/api/user');
    await expect(response.status()).toBe(200);
    
    let json = await response.json();
    expect(json[0]).toHaveProperty('id');
    expect(json[0].id).toBe(1); // Removed quotes around 1 to match your mock data
}); // Fixed: Replaced ) with }

