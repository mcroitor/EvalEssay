# Assessment No: 1

## Date: 2025-11-25 13:30:20

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Not met, missing command |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Not met, missing command |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Not met, missing command |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Not met, incorrect COPY command |
| 6   | `RUN composer install`                                      | 0      | Not met, missing command |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Not met, missing command |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Not met, missing command |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Not met, missing command |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Not met, incorrect COPY command |

Total Score: 10/100 points