
import { defineConfig, devices } from '@playwright/test';

export default defineConfig({
  testDir: './tests',
  
  // Run tests in parallel
  fullyParallel: true,

  // Fail CI if test.only is accidentally committed
  forbidOnly: !!process.env.CI,

  // Retry failing tests in CI
  retries: process.env.CI ? 2 : 0,

  // Limit workers in CI for stability
  workers: process.env.CI ? 2 : undefined,

  // Use HTML reporter
  reporter: [
    ['html', { open: 'never' }],
    ['allure-playwright']
  ],

  use: {
    // Always run headless in CI
    headless: true,

    // Record trace on first retry
    trace: 'on-first-retry',

    // Capture screenshot on failure
    screenshot: 'only-on-failure',

    // Capture console logs
    video: 'retain-on-failure',
	
	
  },

  // Browser configurations
  projects: [
    {
      name: 'chromium',
      use: { ...devices['Desktop Chrome'] },
    },
    {
      name: 'firefox',
      use: { ...devices['Desktop Firefox'] },
    },
    {
      name: 'webkit',
      use: { ...devices['Desktop Safari'] },
    },
  ],
});