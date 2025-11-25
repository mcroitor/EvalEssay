# Assessment No: 41

## Date: 2025-11-24 19:18:43

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax, matches requirement. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct syntax, matches requirement. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct syntax, matches requirement. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 5      | Used `$APP_DIR` instead of `${APP_DIR}` (minor typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Used `$APP_DIR/` and omitted braces (minor typos). |
| 6   | `RUN composer install`                                      | 0      | Command missing. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Command missing. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Command missing. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Command missing. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Command missing. |
|     | **Total**                                                   | **40** | |

Total Score: 40/100 points