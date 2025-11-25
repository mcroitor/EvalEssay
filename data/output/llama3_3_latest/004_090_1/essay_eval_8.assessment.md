# Assessment No: 8

## Date: 2025-11-25 13:46:29

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Typo: $APP_DIR should be ${APP_DIR} in WORKDIR |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Typo: $APP_DIR should be ${APP_DIR} |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     |       |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 5      | Error: Missing --from=builder and incorrect path |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

Total Score: 81/100 points