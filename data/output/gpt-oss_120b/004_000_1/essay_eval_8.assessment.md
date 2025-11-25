# Assessment No: 8

## Date: 2025-11-25 14:11:14

| Nr. | Criterion                                                   | Points | Notes                     |
| --- | ----------------------------------------------------------- | ------ | ------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Missing / incorrect       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing / incorrect       |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing / incorrect       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing / incorrect       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Missing / incorrect       |
| 6   | `RUN composer install`                                      | 0      | Missing / incorrect       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing / incorrect       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing / incorrect       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing / incorrect       |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing / incorrect       |

Total Score: 0/100 points