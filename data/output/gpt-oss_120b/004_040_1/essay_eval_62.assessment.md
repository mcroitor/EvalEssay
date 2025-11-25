# Assessment No: 62

## Date: 2025-11-24 19:54:44

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Used literal `2.7` instead of `${COMPOSER_VERSION}` |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Did not use `${APP_DIR}` and `APP_DIR` not defined |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Used literal `8.1-fpm` instead of `${PHP_VERSION}` |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |
|     | **Total**                                                   | **50** |       |

Total Score: 50/100 points