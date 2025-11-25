# Assessment No: 14

## Date: 2025-11-24 18:33:24

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct command, but placed after `ENV` (order issue) |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct command, but placed before `FROM` (order issue) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}` (minor typo) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR/` and missing braces (minor typo) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Used `${APP_DIR}` variable instead of literal path (acceptable but not exact) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |

**Total Score:** 90/100 points