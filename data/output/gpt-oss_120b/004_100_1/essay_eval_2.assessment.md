# Assessment No: 2

## Date: 2025-11-24 18:13:23

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Missing braces around variable (`$COMPOSER_VERSION` instead of `${COMPOSER_VERSION}`) |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Missing braces around variable (`$APP_DIR` instead of `${APP_DIR}`) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Missing braces around variable and added trailing slash |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Missing braces around variable (`$PHP_VERSION` instead of `${PHP_VERSION}`) |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 5      | Destination typo (`vendr` instead of `vendor`) and missing braces around source variable |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |

**Total Score:** 87/100 points