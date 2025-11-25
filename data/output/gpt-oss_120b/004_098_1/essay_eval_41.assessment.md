# Assessment No: 41

## Date: 2025-11-24 19:19:46

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct command but placed out of order |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct command but placed out of order |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` instead of `${APP_DIR}` – still valid |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Trailing slash and `$` syntax; functionally correct |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses variable `${APP_DIR}` – resolves correctly |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |
|     | **Total**                                                   | **94** | 4 points deducted for two commands out of order (ENV and FROM) |