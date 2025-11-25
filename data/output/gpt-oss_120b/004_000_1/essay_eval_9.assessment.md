# Assessment No: 9

## Date: 2025-11-25 14:13:04

| Nr. | Criterion                                                   | Points | Notes                     |
| --- | ----------------------------------------------------------- | ------ | -------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Missing or incorrect       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing or incorrect       |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing or incorrect       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing or incorrect       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Missing or incorrect       |
| 6   | `RUN composer install`                                      | 0      | Missing or incorrect       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing or incorrect       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing or incorrect       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing or incorrect       |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing or incorrect       |

Total Score: 0/100 points