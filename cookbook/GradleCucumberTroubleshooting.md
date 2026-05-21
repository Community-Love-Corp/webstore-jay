# Gradle Cucumber Troubleshooting FAQ

## 1.0 Summary

## 2.0 Administration

### 2.1 Change Log

```
| Version | Date        | Author    | Description
|---------|-------------|-----------|-------------------------------|
| 0.1     | 7 May 2026  | Sarna, J. | Initial Draft                 |       
```

### 2.2 Table of Contents

## 3.0 ISSUE #1: Unable to Delete 'Build Directory'
If gradle Cucumber tests get stuck with following error:

```txt
..\acceptance-tests>gradlew "-DexternalIp=http://127.0.0.1:8000/resilience" "-DtestPhrase=forgive" clean test
> Task :clean FAILED

FAILURE: Build failed with an exception.

* What went wrong:
Execution failed for task ':clean'.
> java.io.IOException: Unable to delete directory 'C:\Users\moose\git\blog-systematicdefence-tech\acceptance-tests\build'
    Failed to delete some children. This might happen because a process has files open or has its working directory set in the target directory.
```

The run the following stops to fix it:

..\acceptance-tests>rmdir /s /q build
..\acceptance-tests>gradle clean test

It should work, if not, continue with following steps:

..\acceptance-tests>gradlew --stop
..\acceptance-tests>gradlew clean
gradlew "-DexternalIp=google.com" "-DtestPhrase=Google" test


