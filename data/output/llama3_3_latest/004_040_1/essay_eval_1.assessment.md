# Assessment No: 1

## Date: 2025-11-25 13:30:41

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Missing variable reference, should be ${COMPOSER_VERSION} instead of hardcoding 2.7 |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Not present in the Dockerfile |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Not present in the Dockerfile, also depends on ENV APP_DIR being set correctly |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Missing variable reference for APP_DIR and incorrect path |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Missing variable reference, should be ${PHP_VERSION} instead of hardcoding 8.1 |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     |       |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

Total Score: 65/100 points