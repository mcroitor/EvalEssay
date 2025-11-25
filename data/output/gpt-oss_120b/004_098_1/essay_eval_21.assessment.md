# Assessment No: 21

## Date: 2025-11-24 18:45:20

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax and value. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Correct, but placed after an `ENV` line (order issue, –2 points). |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Correct value but appears before the `FROM` statement (order issue, –2 points). |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor syntax deviation, counted as one typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR/` and trailing slash (minor syntax deviation, one typo). |
| 6   | `RUN composer install`                                      | 10     | Fully correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Fully correct. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Fully correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses `${APP_DIR}` which expands to the same path; no error. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Fully correct. |
|     | **Total**                                                   | **92** | |

**Total Score:** 92/100 points