# Assessment No: 62

## Date: 2025-11-24 19:55:06

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Command present and correct value, but placed after the `FROM` line (misplaced → –2 points). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | `FROM` line is present, but missing the required `AS builder` alias. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct and properly placed. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (acceptable syntax but counts as a minor deviation). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added an invalid `--builder` flag and incorrect source path; does not match required command. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Command correct but placed after the `FROM php` line (misplaced → –2 points). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | `FROM` line present, but the `ARG PHP_VERSION` is defined after it, so the variable cannot be resolved correctly. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and incorrect source/destination paths. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the whole context (`.`) instead of the `./site` directory. |
|     | **Total**                                                   | **54** |       |

**Total Score:** 54/100 points