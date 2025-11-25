# Assessment No: 5

## Date: 2025-11-24 18:17:19

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Correct syntax, but placed after the `FROM` line (misplaced → -2). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing `AS builder` alias; command does not match required form. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Exact match, correctly positioned. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added invalid `--builder` flag and used `$APP_DIR/`; does not meet requirement. |
| 6   | `RUN composer install`                                      | 10     | Exact match. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Correct syntax but defined after the `FROM php` line (misplaced → -2). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Correct command, but `${PHP_VERSION}` not defined at this point (misplaced → -2). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and incorrect source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies whole context (`.`) instead of `./site/`. |
|     | **Total**                                                   | **52** | |

**Total Score:** 52/100 points