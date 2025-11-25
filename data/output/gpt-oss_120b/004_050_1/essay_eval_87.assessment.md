# Assessment No: 87

## Date: 2025-11-24 20:37:56

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with the required value. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Syntax matches the specification. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Proper environment variable set. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` – functional but a minor deviation. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR/` and includes a trailing slash; still works but not exact wording. |
| 6   | `RUN composer install`                                      | 0      | Command missing. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Command missing. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Command missing. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Command missing. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Command missing. |
|     | **Total**                                                   | **46** | |

Total Score: 46/100 points