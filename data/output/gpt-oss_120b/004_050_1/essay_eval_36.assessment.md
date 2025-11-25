# Assessment No: 36

## Date: 2025-11-24 19:10:10

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax, matches requirement. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct syntax, matches requirement. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct syntax, matches requirement. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` – functional but a minor deviation. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR/` and includes a trailing slash – still correct but not exact. |
| 6   | `RUN composer install`                                      | 0      | Missing command. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing command. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing command. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing command. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing command. |
|     | **Total**                                                   | **46** | |

Total Score: 46/100 points