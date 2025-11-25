# Assessment No: 5

## Date: 2025-11-25 14:07:32

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Uses `$COMPOSER_VERSION` instead of `${...}` but functionally correct |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` instead of `${...}` but works |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correct (trailing slash does not affect) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Uses `$PHP_VERSION` without braces but is valid |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Destination typo (`vendr` instead of `vendor`) – one typo |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |

**Total Score:** 98/100 points