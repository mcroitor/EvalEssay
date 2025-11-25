# Assessment No: 70

## Date: 2025-11-24 20:09:30

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Misplaced (appears after an `ENV` line) |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Misplaced (appears before the first `FROM`) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | `$APP_DIR` is acceptable |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Trailing slash does not affect correctness |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | `${APP_DIR}` expands correctly |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

**Total Score:** 96/100 points