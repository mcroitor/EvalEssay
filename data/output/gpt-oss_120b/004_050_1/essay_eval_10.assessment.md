# Assessment No: 10

## Date: 2025-11-25 14:15:15

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor typo) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Uses `$APP_DIR/` and missing braces (two typos) |
| 6   | `RUN composer install`                                      | 0      | Missing |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing |
|     | **Total**                                                   | **43** | 43/100 points |