# Assessment No: 8

## Date: 2025-11-25 13:46:19

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Missing variable syntax, should be `FROM composer:${COMPOSER_VERSION} AS builder` instead of `FROM composer:2.7 AS builder` |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 5      | Typo error, should be `WORKDIR ${APP_DIR}` instead of `WORK DIR $AP_DIR`, also variable name is incorrect ($AP_DIR instead of $APP_DIR) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Small typo error, missing `/` at the end of `$APP_DIR/` should be `${APP_DIR}/` |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Missing variable syntax, should be `FROM php:${PHP_VERSION}-fpm` instead of `FROM php:8.1-fpm` |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Small typo error, missing `/` at the beginning of `${APP_DIR}/vendor`, should be `${APP_DIR}/vendor` |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

Total Score: 81/100 points