# Assessment No: 4

## Date: 2025-11-25 14:04:52

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Used `$APP_DIR` instead of `${APP_DIR}` – functionally equivalent |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Used `$APP_DIR/` and trailing slash – acceptable |
| 6   | `RUN composer install`                                      | 0      | Missing command |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing command |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing command |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing command |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing command |
|     | **Total**                                                   | **50** |       |

Total Score: 50/100 points