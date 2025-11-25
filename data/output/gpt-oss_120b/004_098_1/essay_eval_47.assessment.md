# Assessment No: 47

## Date: 2025-11-24 19:29:53

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Correct syntax but placed after an `ENV` (misordered, –2) |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Correct value but appears before the builder `FROM` (misordered, –2) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor syntax difference) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correct (trailing slash on destination is acceptable) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses `${APP_DIR}` which resolves to `/composer`; functionally correct |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |

**Total Score:** 94/100 points