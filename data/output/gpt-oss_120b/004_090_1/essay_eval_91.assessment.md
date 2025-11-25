# Assessment No: 91

## Date: 2025-11-24 20:46:00

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax, matches requirement. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` instead of `${APP_DIR}` – functionally equivalent, no error. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Uses `$APP_DIR/` with trailing slash – acceptable. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and uses `${APP_DIR}` instead of the builder stage; does not meet requirement. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct. |

**Total Score:** 90/100 points