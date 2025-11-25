# Assessment No: 28

## Date: 2025-11-24 18:56:55

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Exact match |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Exact match |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Exact match |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Used `$APP_DIR` instead of `${APP_DIR}` – functionally equivalent |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Used `$APP_DIR/` with trailing slash – acceptable |
| 6   | `RUN composer install`                                      | 10     | Exact match |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Exact match |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Exact match |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and used `${APP_DIR}` which is not defined in this stage |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Exact match |

**Total Score:** 90/100 points