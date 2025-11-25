# Assessment No: 1

## Date: 2025-11-25 12:59:20

| Nr. | Criterion                                                   | Points | Notes                                      |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |                                            |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |                                            |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |                                            |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Missing curly braces around APP_DIR       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Extra slash at the end of the command      |
| 6   | `RUN composer install`                                      | 0      | Command is missing                         |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Command is missing                         |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Command is missing                         |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Command is missing                         |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Command is missing                         |

Total Score: 46/100 points