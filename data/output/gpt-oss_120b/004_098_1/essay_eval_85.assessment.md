# Assessment No: 85

## Date: 2025-11-24 20:35:21

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Misplaced: appears after an `ENV` instead of directly after the `ARG`. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Misplaced: should come after the `FROM` builder stage. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     |       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     |       |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     |       |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |
|     | **Total**                                                   | **96** | (4 points deducted for two misplaced commands) |

Total Score: 96/100 points