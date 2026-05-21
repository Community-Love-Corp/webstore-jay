# SOP Add a Concordian folder in Laravel Project

This is exactly how teams integrate cross tech acceptance tests: the Laravel app stays pure PHP, and the Concordion tests live as an independent Java test suite that *targets* the Laravel endpoints.


## 1.0 SUMMARY

## 2.0 ADMINISTRATION

### 2.1 Change 

```
| Version | Date        | Author    | Description
|---------|-------------|-----------|-------------------------------|
| 0.1     | 7 May 2026  | Sarna, J. | Initial Draft                 |       
```


### 2.2 Table of contents

- [1.0 SUMMARY](#10-summary)
- [2.0 ADMINISTRATION](#20-administration)
  - [2.1 Change Log](#21-change-log)
  - [2.2 Table of Contents](#22-table-of-contents)
- [3.0 PREREQUISITE STEPS](#30-prerequisite-steps)
  - [3.1 FOLDER STRUCTURE](#31-folder-structure)
  - [3.2 Why this works](#32-why-this-works)
- [4.0 RUN TESTS](#40-run-tests)
- [5.0 RUN TESTS IN CI/CD](#50-run-tests-in-cicd)
- [6.0 CAUTION](#60-caution)
- [7.0 CONCLUSION](#70-conclusion)

## 3.0 PREREQUISITE STEPS

### 3.1 FOLDER STRUCTURE

Example:

```
laravel-project/
│
├── app/
├── routes/
├── public/
├── vendor/
│
└── acceptance-tests/        ← your Java + Gradle Concordion module
    ├── build.gradle
    ├── settings.gradle
    └── src/
        ├── test/java/...
        └── test/resources/...
```

This folder is **not** part of Laravel.  
It is simply another module inside the same Git repository.

Your Laravel project remains untouched.

---

### 3.2 Why this works

Laravel (PHP) and Concordion (Java) do not conflict because:

- Gradle runs in its own directory  
- Java dependencies stay inside `acceptance-tests/build/`  
- PHP Composer dependencies stay inside `vendor/`  
- CI/CD can run both:  
  - `composer install` for Laravel  
  - `./gradlew test` for Concordion

They are completely isolated.

---

## 4.0 RUN TESTS
From the root of the Laravel project:

```
cd acceptance-tests
./gradlew clean test
```

Concordion will hit your Laravel endpoints exactly the same way it hits any other URL.

---

## 5.0 RUN TESTS IN CI/CD

Your pipeline can simply add:

```yaml
- name: Run Concordion acceptance tests
  working-directory: acceptance-tests
  run: ./gradlew clean test
```

This works even if the Laravel app is started earlier in the pipeline.

---

## 6.0 CAUTION

You **should not** put Java code inside Laravel’s `app/` or `tests/` folders.  
Laravel’s autoloading, Composer, and PHP tooling will not understand it.

Keeping Concordion in its own Gradle module is the clean, industry‑standard approach.

---

## 7.0 CONCLUSION

Concordion tests cab be added to a Laravel project, **as long as they live in their own Gradle module**. This gives:

- Clean separation of PHP and Java ecosystems  
- No dependency conflicts  
- Easy CI/CD integration  
- Ability to test Laravel endpoints using Concordion HTML specs  

