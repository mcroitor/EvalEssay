# Assessment No: 18

## Date: 2025-11-24 18:38:57

| Nr. | Criterion                                                   | Points | Notes               |
| --- | ----------------------------------------------------------- | ------ | ------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Missing             |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing             |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing             |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing             |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Missing             |
| 6   | `RUN composer install`                                      | 10     | Correct             |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing             |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing             |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing             |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing             |

Total Score: 10/100 points