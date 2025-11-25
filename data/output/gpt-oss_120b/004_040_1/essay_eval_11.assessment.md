# Assessment No: 11

## Date: 2025-11-24 18:27:19

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax and value. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Uses literal tag `2.7` instead of the variable. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing entirely. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing entirely. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Correct source and destination, but does not reference the `APP_DIR` variable. |
| 6   | `RUN composer install`                                      | 10     | Correct command. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct syntax and value. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Uses literal tag `8.1-fpm` instead of the variable. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct command. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct command. |
|     | **Total**                                                   | **65** | No order penalties applied. |

Total Score: 65/100 points