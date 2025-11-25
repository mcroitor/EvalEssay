# Assessment No: 80

## Date: 2025-11-24 20:27:01

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | `$COMPOSER_VERSION` is valid syntax |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | `$APP_DIR` is valid syntax |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Trailing slash is acceptable |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | `$PHP_VERSION` is valid syntax |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Destination typo (`vendr` instead of `vendor`) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |
|     | **Total**                                                   | **98** | |

Total Score: 98/100 points