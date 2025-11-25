# Assessment No: 67

## Date: 2025-11-24 20:03:11

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Used literal `2.7` instead of the `${COMPOSER_VERSION}` variable. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing ENV declaration. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing WORKDIR declaration. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Destination uses literal path `/composer` instead of `${APP_DIR}`. |
| 6   | `RUN composer install`                                      | 10     | Correct command. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Used literal `8.1-fpm` instead of `${PHP_VERSION}` variable. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct command. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct command. |
|     | **Total**                                                   | **50** | |

Total Score: 50/100 points