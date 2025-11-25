# Assessment No: 6

## Date: 2025-11-25 13:55:06

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used hard-coded version instead of variable `${COMPOSER_VERSION}` |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing in the Dockerfile |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing in the Dockerfile |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used hard-coded path `/composer` instead of variable `${APP_DIR}` |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Used hard-coded path `/composer/vendor` instead of variable `${APP_DIR}/vendor` |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

Total Score: 74/100 points

Notes:
- Deduction for incorrect order is not applied as the commands are in a logical sequence.
- Points were deducted for using hard-coded paths instead of variables where specified.