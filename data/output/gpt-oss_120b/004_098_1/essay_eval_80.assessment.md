# Assessment No: 80

## Date: 2025-11-24 20:26:52

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Correct command but placed after `ENV`; order penalty –2. |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Correct command but placed before the builder `FROM`; order penalty –2. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Correct intent but uses `$APP_DIR` instead of `${APP_DIR}` and is out of expected order; order penalty –2. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correct command (variable syntax acceptable). |
| 6   | `RUN composer install`                                      | 10     | Correct command. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct command. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct command. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses `${APP_DIR}` which resolves to `/composer`; functionally correct. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct command. |
|     | **Total**                                                   | **94** | |

Total Score: 94/100 points