# Assessment No: 40

## Date: 2025-11-24 19:17:01

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}` (minor syntax deviation) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR/` with trailing slash (minor deviation) |
| 6   | `RUN composer install`                                      | 0      | Missing |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing |
|     | **Total**                                                   | **46** |       |

Total Score: 46/100 points