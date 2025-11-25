# Assessment No: 38

## Date: 2025-11-24 19:14:15

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Exact match |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Exact match |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Exact match |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}` (minor typo) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR/` and trailing slash (minor typo) |
| 6   | `RUN composer install`                                      | 10     | Exact match |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Exact match |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Exact match |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and used wrong source path |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Exact match |

**Total Score:** 86/100 points