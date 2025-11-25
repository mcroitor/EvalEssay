# Assessment No: 7

## Date: 2025-11-24 18:21:32

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Uses `$COMPOSER_VERSION` instead of `${COMPOSER_VERSION}` |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` without braces |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR/` with trailing slash – functionally equivalent |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Uses `$PHP_VERSION` without braces |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Destination path typo (`vendr` instead of `vendor`) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |
|     | **Total**                                                   | **90** |       |

Total Score: 90/100 points