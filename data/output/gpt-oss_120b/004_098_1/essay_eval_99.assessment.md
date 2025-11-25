# Assessment No: 99

## Date: 2025-11-24 21:00:03

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Exact match. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Correct command but placed out of order (should follow ARG). |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Correct command but misplaced (appears before the builder stage). |
| 4   | `WORKDIR ${APP_DIR}`                                        | 6      | Uses `$APP_DIR` instead of `${APP_DIR}` (one typo) and is out of order. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Uses `$APP_DIR` and adds a trailing slash (two typos). |
| 6   | `RUN composer install`                                      | 10     | Exact match. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Exact match. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Exact match. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct (variable resolves to the same path). |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Exact match. |

**Total Score:** 87/100 points