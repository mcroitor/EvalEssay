# Assessment No: 2

## Date: 2025-11-25 13:32:45

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Missing variable reference, used hardcoded version instead of ${COMPOSER_VERSION} |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Not present in the Dockerfile |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Not present in the Dockerfile, also depends on missing ENV variable |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Missing ENV variable reference for APP_DIR, used hardcoded path instead of ${APP_DIR} |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Missing variable reference, used hardcoded version instead of ${PHP_VERSION} |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     |       |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

Total Score: 65/100 points