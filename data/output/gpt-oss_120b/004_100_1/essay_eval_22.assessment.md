# Assessment No: 22

## Date: 2025-11-24 18:47:08

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Uses `$COMPOSER_VERSION` (equivalent to `${...}`); functionally correct. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Exact match. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` (equivalent); correct. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Path and variable usage are correct (trailing slash is harmless). |
| 6   | `RUN composer install`                                      | 10     | Exact match. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Exact match. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Uses `$PHP_VERSION` (equivalent); correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Destination typo: `vendr` instead of `vendor` (one typo). |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Exact match. |
|     | **Total**                                                   | **98** | |

Total Score: 98/100 points