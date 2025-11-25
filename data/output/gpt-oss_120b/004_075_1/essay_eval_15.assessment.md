# Assessment No: 15

## Date: 2025-11-24 18:34:39

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Uses literal tag `2.7` instead of the variable `${COMPOSER_VERSION}`. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Misspelled as `WORK DIR $AP_DIR`; wrong command and variable name. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR/` instead of `${APP_DIR}`; functional but minor syntax issue. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Uses literal tag `8.1-fpm` instead of the variable `${PHP_VERSION}`. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct (variable `${APP_DIR}` resolves to `/composer`). |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct. |
|     | **Total**                                                   | **78** | No order penalties applied. |

**Total Score:** 78/100 points