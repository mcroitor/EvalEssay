# Assessment No: 88

## Date: 2025-11-24 20:39:45

| Nr. | Criterion                                                   | Points | Notes                                 |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct                               |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct                               |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct                               |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` which is functionally equivalent |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Uses `$APP_DIR/` with trailing slash – acceptable |
| 6   | `RUN composer install`                                      | 0      | Missing command                       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing command                       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing command                       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing command                       |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing command                       |
|     | **Total**                                                   | **50** |                                       |

Total Score: 50/100 points