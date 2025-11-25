# Assessment No: 53

## Date: 2025-11-24 19:39:19

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Uses literal version instead of variable (`${COMPOSER_VERSION}`) |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Destination uses literal path instead of `${APP_DIR}` |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Uses literal version instead of variable |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |

**Total Score:** 74/100 points