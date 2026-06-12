# Decoding Testing

## PRE-REQ: Why you see a “Feature” folder but no “*.feature” files
Laravel uses PHPUnit, and by convention it splits tests into:

tests/Feature/ → high‑level integration tests

tests/Unit/ → small, isolated tests

The word “Feature” here has nothing to do with Cucumber or Gherkin.
It’s just Laravel’s naming convention.

So:

Feature folder ≠ Cucumber features

Feature folder = PHPUnit integration tests

That’s why you see:

Code
AuthenticationTest.php
RegistrationTest.php
ProfileTest.php
…but no .feature files.


# ⭐ 1. Run ALL tests
From your project root:

Setup HTML reporter 'phpunit/phpunit-printer'. It is the same package Laravel uses to show the pretty CLI test output.

```
sudo apt install php-pear
composer require --dev phpunit/phpunit-printer
```
Run tests:

```
php artisan test --report --min=info
```



Look at /home/jyotirmay/webstore-jay/report.html to see html report, or, if you’re inside Sail:

```
vendor/bin/sail test
```

Laravel will automatically discover:

- `tests/Feature/*`
- `tests/Unit/*`

---

![Test Suite Report Screenshot](../public/screenshots/test-suite-report.jpg) 

# ⭐ 2. Run only Feature tests

```
php artisan test --testsuite=Feature
```

or in Sail:

```
vendor/bin/sail test --testsuite=Feature
```

---

# ⭐ 3. Run only Unit tests

```
php artisan test --testsuite=Unit
```

---

# ⭐ 4. Run a single test file  
Example: run only `AuthenticationTest.php`:

```
php artisan test tests/Feature/Auth/AuthenticationTest.php
```

Sail version:

```
vendor/bin/sail test tests/Feature/Auth/AuthenticationTest.php
```

---

# ⭐ 5. Run a single test method  
Example: run only `test_user_can_register` inside `RegistrationTest.php`:

```
php artisan test --filter test_user_can_register
```

---

# ⭐ 6. Run tests with detailed output  
Useful when debugging:

```
php artisan test -v
```

---

# ⭐ 7. Run tests in parallel (much faster)

```
php artisan test --parallel
```

Laravel will automatically spin up multiple processes.

---

# ⭐ 8. If you’re using Sail and MySQL containers  
Make sure Sail is running first:

```
vendor/bin/sail up -d
```

Then run:

```
vendor/bin/sail test
```

Laravel will automatically use the `testing` database defined in your `.env.testing`.

---

# ⭐ 9. If you want to confirm your test environment  
Run:

```
php artisan about
```

Look for:

```
Environment: testing
```

---
Absolutely, Jay — you already have a full Laravel test suite in place (Feature + Unit).  
Here’s **exactly how to run them**, the way a real Laravel project expects, and the way CI/CD pipelines do it.

---

# ⭐ 1. Run ALL tests
From your project root:

```
php artisan test
```

or, if you’re inside Sail:

```
vendor/bin/sail test
```

Laravel will automatically discover:

- `tests/Feature/*`
- `tests/Unit/*`

---

# ⭐ 2. Run only Feature tests

```
php artisan test --testsuite=Feature
```

or in Sail:

```
vendor/bin/sail test --testsuite=Feature
```

---

# ⭐ 3. Run only Unit tests

```
php artisan test --testsuite=Unit
```

---

# ⭐ 4. Run a single test file  
Example: run only `AuthenticationTest.php`:

```
php artisan test tests/Feature/Auth/AuthenticationTest.php
```

Sail version:

```
vendor/bin/sail test tests/Feature/Auth/AuthenticationTest.php
```

---

# ⭐ 5. Run a single test method  
Example: run only `test_user_can_register` inside `RegistrationTest.php`:

```
php artisan test --filter test_user_can_register
```

---

# ⭐ 6. Run tests with detailed output  
Useful when debugging:

```
php artisan test -v
```

---

# ⭐ 7. Run tests in parallel (much faster)

```
php artisan test --parallel
```

Laravel will automatically spin up multiple processes.

---

# ⭐ 8. If you’re using Sail and MySQL containers  
Make sure Sail is running first:

```
vendor/bin/sail up -d
```

Then run:

```
vendor/bin/sail test
```

Laravel will automatically use the `testing` database defined in your `.env.testing`.

---

# ⭐ 9. If you want to confirm your test environment  
Run:

```
php artisan about
```

Look for:

```
Environment: testing
```

---

Great — since you're running **GitHub Actions**, I’ll give you a **production‑grade Laravel CI pipeline** that:

- installs PHP + Composer  
- caches dependencies (massive speed boost)  
- sets up MySQL/Postgres (or SQLite)  
- runs migrations  
- runs your full test suite  
- uploads test results (optional)  

This is the same structure used by senior Laravel teams.

---

# ⭐ **Your GitHub Actions workflow (drop‑in ready)**  
Create this file:

```
.github/workflows/tests.yml
```

And paste this:

```yaml
name: Run Laravel Tests

on:
  push:
    branches: [ main, dev ]
  pull_request:
    branches: [ main, dev ]

jobs:
  tests:
    runs-on: ubuntu-latest

    services:
      mysql:
        image: mysql:8
        env:
          MYSQL_ROOT_PASSWORD: root
          MYSQL_DATABASE: testing
        ports:
          - 3306:3306
        options: >-
          --health-cmd="mysqladmin ping --silent"
          --health-interval=5s
          --health-timeout=5s
          --health-retries=10

    steps:
      - name: Checkout code
        uses: actions/checkout@v4

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          php-version: '8.2'
          extensions: mbstring, pdo, pdo_mysql, intl, fileinfo
          coverage: none

      - name: Cache Composer dependencies
        uses: actions/cache@v4
        with:
          path: vendor
          key: composer-${{ hashFiles('composer.lock') }}
          restore-keys: composer-

      - name: Install dependencies
        run: composer install --no-progress --prefer-dist --optimize-autoloader

      - name: Copy .env.testing
        run: cp .env.testing .env

      - name: Generate app key
        run: php artisan key:generate

      - name: Wait for MySQL
        run: |
          until mysqladmin ping -h127.0.0.1 --silent; do
            echo "Waiting for database..."
            sleep 2
          done

      - name: Run migrations
        run: php artisan migrate --force

      - name: Run tests
        run: php artisan test --parallel
```

---

# ⭐ Why this workflow is excellent

### ✔ Fast  
Composer caching + parallel tests = huge speed improvement.

### ✔ Stable  
MySQL container is health‑checked before tests run.

### ✔ Laravel‑native  
Uses `.env.testing` exactly the way Laravel expects.

### ✔ CI‑friendly  
Runs on every push + PR to `main` and `dev`.

---

# ⭐ If you want SQLite instead (simpler + faster)
Replace the database section with:

```yaml
      - name: Use SQLite
        run: |
          touch database/database.sqlite
          php artisan migrate --force
```

And set `.env.testing` to:

```
DB_CONNECTION=sqlite
DB_DATABASE=:memory:
```

---

# ⭐ If you want test artifacts (HTML, JUnit, coverage)
I can add:

- JUnit XML upload  
- HTML coverage report  
- GitHub Actions test summary  
- Code coverage badge  

Just tell me what kind of output you want.

---

# ⭐ Want me to integrate this with your existing `ci.yml` or `ci-keyvault.yml`?
I can merge them cleanly so:

- tests run  
- keyvault secrets load  
- build + deploy steps run in order  

Tell me which workflows you want combined.

