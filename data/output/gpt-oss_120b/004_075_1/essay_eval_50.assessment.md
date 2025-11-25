# Assessment No: 50

## Date: 2025-11-24 19:34:42

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Used literal `2.7` instead of the `${COMPOSER_VERSION}` variable |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 5      | Typo in command (`WORK DIR`) and variable name (`$AP_DIR` missing a “P”) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correct ( `$APP_DIR` is acceptable ) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Used literal `8.1-fpm` instead of the `${PHP_VERSION}` variable |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct ( `${APP_DIR}` resolves to `/composer` ) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |

**Total Score:** 85/100 points