# Assessment No: 88

## Date: 2025-11-24 20:40:03

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Correct value but placed after the `FROM` line (misplaced). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 3      | Missing `AS builder`; also appears before the `ARG` (misplaced). |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` which is acceptable. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Uses invalid `--builder` flag and incorrect syntax. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Correct value but placed after the `FROM php` line (misplaced). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies entire context (`.`) instead of `./site`. |
|     | **Total**                                                   | **69** |       |

**Total Score:** 69/100 points