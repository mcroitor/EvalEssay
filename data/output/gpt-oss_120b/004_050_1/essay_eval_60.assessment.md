# Assessment No: 60

## Date: 2025-11-24 19:51:13

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct syntax. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}` (minor typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR/` with trailing slash (minor typo). |
| 6   | `RUN composer install`                                      | 0      | Missing command. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing command. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing command. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing command. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing command. |
|     | **Total**                                                   | **46** |       |

Total Score: 46/100 points