# Assessment No: 2

## Date: 2025-11-25 14:01:10

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Uses literal tag `2.7` instead of the `${COMPOSER_VERSION}` variable. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Uses literal path `/composer` and does not reference `${APP_DIR}`; also `ENV` not set. |
| 6   | `RUN composer install`                                      | 8      | Correct command but placed out of the expected order (deduct 2 points). |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Uses literal tag `8.1-fpm` instead of the `${PHP_VERSION}` variable. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct command and order. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct command and order. |
|     | **Total**                                                   | **48** | |

Total Score: 48/100 points