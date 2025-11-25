# Assessment No: 7

## Date: 2025-11-25 13:43:09

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Not met, missing command |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Not met, missing command |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Not met, missing command |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrect COPY command, missing destination and incorrect source |
| 6   | `RUN composer install`                                      | 0      | Not met, missing command |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Not met, missing command |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Not met, missing command and dependency on previous missing commands |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Not met, missing command and dependencies on previous missing commands |
| 10  | `COPY ./site/ /var/www/html/`                               | 5      | Partially met, incorrect source in COPY command |

Total Score: 15/100 points