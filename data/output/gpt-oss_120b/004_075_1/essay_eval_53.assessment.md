# Assessment No: 53

## Date: 2025-11-24 19:39:53

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Uses literal `2.7` instead of the `${COMPOSER_VERSION}` variable. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Misspelled as `WORK DIR $AP_DIR`; wrong command and variable name. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (single typo). |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Uses literal `8.1-fpm` instead of the `${PHP_VERSION}` variable. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct (variable resolves to `/composer`). |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct. |
|     | **Total**                                                   | **78** | No order penalties applied. |