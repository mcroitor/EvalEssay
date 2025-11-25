# Assessment No: 49

## Date: 2025-11-24 19:33:22

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Placed after `ENV`, order mismatch (-2) |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Placed before `FROM`, order mismatch (-2) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correct (uses `$APP_DIR`, acceptable) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correct (uses `$APP_DIR/`, acceptable) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct (uses `${APP_DIR}` which expands to `/composer`) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |
|     | **Total**                                                   | **96** | |

Total Score: 96/100 points