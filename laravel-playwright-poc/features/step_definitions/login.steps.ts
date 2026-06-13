import { Given, When, Then } from '@cucumber/cucumber';
import { chromium, expect } from '@playwright/test';
import type { Browser, Page } from '@playwright/test';

let browser: Browser;
let page: Page;

Given('I am on the login page', async function () {
  browser = await chromium.launch();
  const context = await browser.newContext();
  page = await context.newPage();
  await page.goto('http://127.0.0.1:8000/login');
});

When('I enter valid credentials', async function () {
  await page.fill('input[name="email"]', 'user@example.com');
  await page.fill('input[name="password"]', 'password');
  await page.click('button[type="submit"]');
});

Then('I should see the dashboard', async function () {
  await page.waitForURL('http://127.0.0.1:8000/dashboard');
  expect(page.url()).toBe('http://127.0.0.1:8000/dashboard');
  await browser.close();
});
 