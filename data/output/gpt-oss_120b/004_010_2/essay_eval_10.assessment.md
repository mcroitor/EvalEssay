# Assessment No: 10

## Date: 2025-11-24 18:25:22

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Command not provided |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Command not provided |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Command not provided |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Command not provided |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Command not provided |
| 6   | `RUN composer install`                                      | 10     | Correct command |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Command not provided |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Command not provided |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Command not provided |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Command not provided |
|     | **Total**                                                   | **10** |       |

Total Score: 10/100 points