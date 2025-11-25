# Assessment No: 15

## Date: 2025-11-24 18:34:50

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax, no errors. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct syntax, no errors. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct syntax, no errors. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}` (minor typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR/` and trailing slash; variable syntax differs from expected. |
| 6   | `RUN composer install`                                      | 10     | Correct syntax, no errors. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct syntax, no errors. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct syntax, no errors. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and incorrect source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct syntax, no errors. |
|     | **Total**                                                   | **86** | |

Total Score: 86/100 points