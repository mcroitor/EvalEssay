# Assessment No: 7

## Date: 2025-11-25 14:10:14

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax, but placed after the FROM line (order issue). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the `AS builder` alias and appears before the ARG; command not as specified. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor syntax deviation). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added invalid `--builder` flag and incorrect path syntax. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct syntax, but placed after the FROM line (order issue). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and uses wrong source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the entire context (`.`) instead of `./site`. |
|     | **Total**                                                   | **62** | Deduction of 6 points for three misplaced commands (ARG COMPOSER_VERSION, FROM composer, ARG PHP_VERSION). |

**Total Score:** 62/100 points