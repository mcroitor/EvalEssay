# Assessment No: 42

## Date: 2025-11-24 19:20:53

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Argument is correct but placed **after** the first FROM, violating the required order. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | FROM line is present, but the required alias **`AS builder`** is missing. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor syntax deviation). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrect syntax (`--builder` flag) and path; does not match the required command. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Argument is correct but appears **after** the second FROM, violating order. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source path; does not meet the criterion. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the whole context (`.`) instead of `./site/`. |
|     | **Total**                                                   | **67** | Deductions: 2 pts each for three misplaced commands (ARG COMPOSER_VERSION, ARG PHP_VERSION, FROM php before its ARG). |  

**Total Score:** 67/100 points