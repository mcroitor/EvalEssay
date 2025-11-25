# Assessment No: 54

## Date: 2025-11-24 19:41:02

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Uses literal tag `2.7` instead of the ARG variable. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Copies to `/composer` but does not use the required `APP_DIR` variable (which is also undefined). |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Uses literal tag `8.1-fpm` instead of the ARG variable. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct. |
|     | **Total**                                                   | **50** | |

Total Score: 50/100 points