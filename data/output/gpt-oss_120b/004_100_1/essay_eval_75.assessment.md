# Assessment No: 75

## Date: 2025-11-24 20:18:17

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | `$COMPOSER_VERSION` is acceptable |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | `$APP_DIR` is acceptable |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Trailing slash does not affect correctness |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | `$PHP_VERSION` is acceptable |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Destination path misspelled as “vendr” |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |
|     | **Total**                                                   | **98** |       |

Total Score: 98/100 points