# Assessment No: 20

## Date: 2025-11-24 18:43:50

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used `$COMPOSER_VERSION` instead of `${COMPOSER_VERSION}` |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` without braces |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR/` without braces |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used `$PHP_VERSION` without braces |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 5      | Misspelled target directory (`vendr`) and missing braces on variable |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |
|     | **Total**                                                   | **87** |       |

Total Score: 87/100 points