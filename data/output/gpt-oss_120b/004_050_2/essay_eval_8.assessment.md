# Assessment No: 8

## Date: 2025-11-24 18:22:24

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Correct value but placed after the first FROM (misplaced, –2). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 3      | Missing `AS builder`; also placed before the ARG (misplaced, –2). |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | `$APP_DIR` is acceptable; command is correct. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added invalid `--builder` flag and incorrect syntax; does not match required command. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Correct value but placed after the second FROM (misplaced, –2). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source/destination paths. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies whole context (`.`) instead of `./site/`. |

**Total Score:** 59/100 points