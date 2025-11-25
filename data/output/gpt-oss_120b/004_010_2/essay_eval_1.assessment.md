# Assessment No: 1

## Date: 2025-11-25 13:59:13

| Nr. | Criterion                                                   | Points | Notes                     |
| --- | ----------------------------------------------------------- | ------ | -------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Missing command           |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing command           |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing command           |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing command           |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Missing command           |
| 6   | `RUN composer install`                                      | 10     | Correct command, no errors|
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing command           |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing command           |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing command           |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing command           |

Total Score: 10/100 points