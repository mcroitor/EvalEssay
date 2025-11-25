# Assessment No: 96

## Date: 2025-11-24 20:54:50

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax and value. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct, but placed after an `ENV` (order issue). |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct syntax; first occurrence misplaced, second duplicate added later. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor syntax variation). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR/` and variable syntax; functionally correct but deviates slightly. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses `${APP_DIR}` variable which resolves to `/composer`; acceptable. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct. |
|     | **Order deductions**                                        | -6     | `FROM builder` misplaced (2 pts), first `ENV` misplaced (2 pts), extra `ENV` misplaced (2 pts). |
|     | **Total**                                                   | **90** | 90/100 points. |