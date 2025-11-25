# Assessment No: 7

## Date: 2025-11-25 13:44:07

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Typo: Should use ${COMPOSER_VERSION} instead of hardcoding 2.7 |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 5      | Typo: Incorrect syntax, should be WORKDIR instead of WORK DIR and ${APP_DIR} instead of $AP_DIR |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Typo: Trailing slash in $APP_DIR/ is unnecessary |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Typo: Should use ${PHP_VERSION} instead of hardcoding 8.1 |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Typo: Incorrect path, should be ${APP_DIR}/vendor instead of /composer/vendor |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

Total Score: 81/100 points