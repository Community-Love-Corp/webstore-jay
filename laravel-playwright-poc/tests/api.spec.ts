
console.log("LOADED API SEC");
import { test, expect } from '@playwright/test';


test.describe('User API', () => {

	test('API returns JSON with required fields', async ({ request }) => {
	  const response = await request.get('/api/user');
	  expect(response.status()).toBe(200);
	
	  const json = await response.json();
	  
	 // Check that the property exists
	  expect(json).toHaveProperty('id');
	  expect(json).toHaveProperty('email');
	});

	test('returns correct email value', async ({ request }) => {
	  const response = await request.get('/api/user');
	  expect(response.status()).toBe(200);
	
	  const json = await response.json();
	  //check the exact value
	  expect(json.email).toBe('modern@example.com');
	});
});




