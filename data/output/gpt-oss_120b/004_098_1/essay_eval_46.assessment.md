# Assessment No: 46

## Date: 2025-11-24 19:28:10

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Correct command but placed after the `ENV` line (order issue, –2 points). |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Correct command but placed before the `FROM` line (order issue, –2 points). |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR` and includes a trailing slash (minor typo). |
| 6   | `RUN composer install`                                      | 10     | Correct command. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct syntax. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct command. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses `${APP_DIR}` which resolves to `/composer`; functionally correct. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct command. |
|     | **Total**                                                   | **92** | |

**Total Score:** 92/100 points