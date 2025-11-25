# Assessment No: 35

## Date: 2025-11-24 19:08:51

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax and value. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Used literal `2.7` instead of the `${COMPOSER_VERSION}` variable. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Misspelled as `WORK DIR $AP_DIR`; multiple syntax errors. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Minor typo: used `$APP_DIR/` (missing braces and extra slash). |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Used literal `8.1-fpm` instead of the `${PHP_VERSION}` variable. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct (uses `${APP_DIR}` which expands to `/composer`). |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct. |
|     | **Total**                                                   | **78** | |

Total Score: 78/100 points