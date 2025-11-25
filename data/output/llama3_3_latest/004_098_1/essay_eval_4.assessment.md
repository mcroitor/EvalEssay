# Assessment No: 4

## Date: 2025-11-25 13:38:01

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Missing quotes around $APP_DIR in WORKDIR, but correct placement of FROM command |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 5      | Incorrect variable usage ($APP_DIR instead of ${APP_DIR}) and missing quotes around $APP_DIR, but correct placement |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Trailing slash in $APP_DIR/, but correct placement |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 5      | Incorrect path ${APP_DIR}/vendor instead of /composer/vendor, but correct placement and usage of --from |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

Total Score: 86/100 points