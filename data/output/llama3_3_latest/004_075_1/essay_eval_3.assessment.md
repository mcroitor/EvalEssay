# Assessment No: 3

## Date: 2025-11-25 13:35:30

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Incorrect syntax, should use ${COMPOSER_VERSION} instead of hardcoding the version |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Incorrect syntax, "WORK DIR" should be "WORKDIR" and $AP_DIR should be ${APP_DIR} |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Trailing slash in $APP_DIR/ is incorrect |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Incorrect syntax, should use ${PHP_VERSION} instead of hardcoding the version |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Incorrect path, should be ${APP_DIR}/vendor instead of /composer/vendor |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

Total Score: 76/100 points