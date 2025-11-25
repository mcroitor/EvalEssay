# Assessment No: 19

## Date: 2025-11-24 18:41:33

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct declaration. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Uses literal `2.7` instead of the build argument. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Misspelled (`WORK DIR`) and wrong variable name `$AP_DIR`. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR/` (missing braces) – minor typo. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Uses literal `8.1-fpm` instead of the build argument. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct path (via `${APP_DIR}`) and syntax. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct. |

**Total Score:** 68/100 points