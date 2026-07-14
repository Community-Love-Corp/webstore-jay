---

#Laravel + Breeze + MySQL + CMS + Recaptcha2 + PHP Unit + Playwright + Cucumber (BDD) Automation Framework

## 1.0 Summary

A complete end‑to‑end automation framework combining:

a. Laravel frontend, backend and api

b. Playwright UI testing

c. Playwright API testing

d. Playwright visual regression

e. Cucumber BDD with TypeScript

f. GitHub Actions CI pipeline

g. HTML reporting

This commercial project demonstrates a modern, production‑grade automation stack suitable for enterprise QA engineering.


## 2.0 Features
### 2.1 UI Automation (Playwright)

i.	Login flow

ii.	Dashboard navigation

iii.	Form interactions

iv.	Assertions and URL checks

v. API Automation

vi.	Tests Laravel API endpoints

vii.	Validates JSON structure

viii.	Status code checks

ix.	Schema validation ready

x. Visual Regression Testing

xi.	Pixel perfect homepage snapshot

xii.	Automatic baseline management

xiii.	Snapshot diffing

xiv. BDD with Cucumber

xv.	Gherkin feature files

xvi.	Step definitions in TypeScript

xvii.	Playwright browser automation inside steps

### 2.2 CI/CD with GitHub Actions

i. Installs dependencies

ii.	Installs Playwright browsers

iii.	Runs UI/API/visual tests

iv.	Runs Cucumber tests

v.	Uploads HTML report as artifact
 
 
### 2.3 Running Tests

#### 2.3.1 UI/API/Visual tests:

i. npx playwright test --reporter=html
ii. npx playwright show-report
iii. BDD tests:
iv. npm run test:bdd

#### 2.3.2 PHP Unit and feature tests

Running 'npm run dev' or 'npm run build' already runs them. Check:

i. test-output.txt
ii. report.html

### 2.4 Requirements
i. 	Node.js 18+
ii.	PHP 8+
iii.	Laravel 10/11
iv.	Playwright
v.	Cucumber.js
 
### 2.5 CI Pipeline
GitHub Actions workflow runs:
i.	Playwright tests
ii.	Cucumber tests
iii.	Uploads HTML report
See .github/workflows/playwright.yml.



## 3.0 Project Structure

```
blog-systematicdefence-tech/
│
├── app/
│   ├── Models/Comment.php
│   └── Http/Controllers/CommentController.php
│
├── public/
│   ├── images/
│   ├── audio/
│   ├── css/
│   └── js/
│
├── resources/
│   ├── views/
│   │   ├── resilience.blade.php
│   │   ├── professionalism.blade.php
│   │   ├── leadership.blade.php
│   │   ├── ethics.blade.php
│   │   └── components/comments.blade.php
│
├── routes/
│   └── web.php
│   └── api.php
└── .env
│
├──Tests
│   └── TestCase.php
│   ├── Unit/
│   |   └── ExampleTest.php
│   ├── Feature/
│       ├── ExampleTest.php
│       └── ProfileTest.php
│       └──Auth/
│           ├── AuthenticationTest.php
│           ├── EmailVerificationTest.php
│           ├── PasswordConfirmationTest.php
│           ├── PasswordResetTest.php
│           ├── PasswordUpdateTest.php
│           └── RegisterationTest.php
├──laravel-playwright-poc/
   │
   ├── features/
   │   ├── login.feature
   │   └── step_definitions/
   │       └── login.steps.ts
   │
   ├── tests/
   │   ├── api.spec.ts
   │   ├── login.spec.ts
   │   └── visual.spec.ts
   │
   ├── .github/workflows/playwright.yml
   ├── cucumber.js
   ├── package.json
   ├── tsconfig.json
   └── playwright.config.ts
```

# 4.0 Setup

Pre-Req : Install XAMPP/ LAMPP for your PC's OS

1. Terminal #1 (Assuming Linux)

```
sudo /opt/lampp/manager-linux-x64.run
```
Start MySQL and Apache Servers

2. Terminal #2

```
cd webstore-jay
php artisan migrate:fresh --seed
php artisan serve

```

# 5.0 Versions


## 1.00

Thu 8 July 07:47 HOURS: 

Branch initialised for testing from "branch fastcomet's Kali Linux version 4.17 - Sun Jun 14 02:42:30 2026 +1200".

## 1.01

Thu 8 July 08:30 HOURS: 

Added Section 4.0 Setup.

## 1.02

Thu 8 July 10:23 HOURS: 

Added laravel-playwright-poc/tests/basics.ts.

## 1.03 - First test passes


Thu 8 July 10:43 HOURS: 
Added and Updated playwright.config.ts to point to tests folder:

```

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

```

First test passes in ui.spec.ts. Test run via command 'npx playwright test ui.spec.ts --ui':

![First UI test passes](./public/screenshots/first-test.jpg)

## 1.04


Thu 8 July 11:07 HOURS: 

Added node_modules folder of base and test sub folders to .gitignore and removed them from git cache, inorder to enable commit of this branch- 'git rm -r --cached laravel-playwright-poc/node_modules'. 


## 1.05


Tue 14 July 18:43 HOURS: 

Ran node server.js to run the endpoint at http://127.0.0.1:8001/api/user. Added stub.spec.ts that holds a test that stubs the outcome of the call http://127.0.0.1:8001/api/user and verified that it works.

## 2.0

Wed 15 July: 

Setup base_url in playwright.config.ts. Login Fixture working with pagemodel implementation of login page and dashboard page. All Playwright tests passing.