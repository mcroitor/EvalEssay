# Assessment No: 9

## Date: 2025-11-24 18:24:47

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct syntax. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct value, but placed before the builder `FROM` (order issue). |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR` and adds a trailing slash (minor typo). |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses `${APP_DIR}` which resolves to `/composer`; acceptable. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct. |
|     | **Total**                                                   | **92** | Deductions: -2 for `ENV APP_DIR` before builder `FROM`; -2 for extra `ENV APP_DIR` after second `FROM` (misplaced commands). |