# Assessment No: 10

## Date: 2025-11-25 13:51:06

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Missing curly braces around $COMPOSER_VERSION |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Missing curly braces around $APP_DIR |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Trailing slash in $APP_DIR/ |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Missing curly braces around $PHP_VERSION and incorrect syntax ($PHP_VERSION-fpm instead of ${PHP_VERSION}-fpm) |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 5      | Incorrect path ($APP_DIR/vendor instead of /composer/vendor) and typo in directory name (vendr instead of vendor) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

Total Score: 81/100 points