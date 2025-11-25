# Assessment No: 30

## Date: 2025-11-24 18:59:19

| Nr. | Criterion                                                   | Points | Notes                         |
| --- | ----------------------------------------------------------- | ------ | ----------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly specified           |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing or incorrect command  |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing or incorrect command  |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing or incorrect command  |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Missing or incorrect command  |
| 6   | `RUN composer install`                                      | 0      | Missing or incorrect command  |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing or incorrect command  |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing or incorrect command  |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing or incorrect command  |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing or incorrect command  |

Total Score: 10/100 points