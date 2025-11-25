# Assessment No: 73

## Date: 2025-11-24 20:14:48

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Uses `$COMPOSER_VERSION` instead of `${COMPOSER_VERSION}` (missing braces) |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (missing braces) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR/` and missing braces (trailing slash is acceptable) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Uses `$PHP_VERSION` instead of `${PHP_VERSION}` (missing braces) |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 5      | Uses `$APP_DIR` (missing braces) and misspells destination as `vendr` |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |

**Total Score:** 87/100 points