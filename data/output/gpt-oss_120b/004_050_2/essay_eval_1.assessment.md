# Assessment No: 1

## Date: 2025-11-25 13:59:49

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Correct syntax but placed **after** the `FROM` line (misplaced). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 3      | Missing `AS builder`; also placed before the `ARG` definition (misplaced). |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correct (using `$APP_DIR` is acceptable). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added invalid `--builder` flag and does not match the required source path. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 3      | Correct value but placed **after** the `FROM php` line (misplaced). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Correct syntax but placed before the `ARG PHP_VERSION` definition (misplaced). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and incorrect source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the whole context (`.`) instead of `./site/`. |

**Total Score:** 52/100 points