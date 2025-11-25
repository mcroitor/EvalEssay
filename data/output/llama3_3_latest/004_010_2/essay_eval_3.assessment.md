# Assessment No: 3

## Date: 2025-11-25 13:34:41

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Not met |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Not met |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Not met |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Not met |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Not met |
| 6   | `RUN composer install`                                      | 0      | Incorrect order and missing dependencies |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Not met |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Not met |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Not met |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Not met |

Total Score: 0/100 points