# Assessment No: 36

## Date: 2025-11-24 19:11:21

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Exact match |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Exact match |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Exact match |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Exact match |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Trailing slash added (`${APP_DIR}/`) – minor typo |
| 6   | `RUN composer install`                                      | 10     | Exact match |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Exact match |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Exact match |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses variable `${APP_DIR}` which resolves correctly |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Exact match |
|     | **Total**                                                   | **98** |       |

Total Score: 98/100 points