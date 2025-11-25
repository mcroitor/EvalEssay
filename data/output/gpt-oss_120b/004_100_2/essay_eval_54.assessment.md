# Assessment No: 54

## Date: 2025-11-24 19:42:23

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correct |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Path resolves correctly (trailing slash optional) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Variable expands to correct path |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |
|     | **Total**                                                   | **100**|       |

Total Score: 100/100 points