# Assessment No: 56

## Date: 2025-11-24 19:44:47

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Correct value but placed after the FROM line (misplaced). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 3      | Missing `AS builder` and placed before the ARG (misplaced). |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor syntax deviation). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Invalid `--builder` flag and syntax does not match required command. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Correct value but placed after the FROM line (misplaced). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Correct syntax but placed before the ARG (misplaced). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and incorrect source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies whole context (`.`) instead of `./site/`. |
|     | **Total**                                                   | **55** | |

Total Score: 55/100 points