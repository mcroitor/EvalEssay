# Assessment No: 94

## Date: 2025-11-24 20:51:24

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Used `$COMPOSER_VERSION` instead of `${COMPOSER_VERSION}` (brace typo) |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 5      | Used `$APP_DIR` instead of `${APP_DIR}` (brace typo) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Used `$APP_DIR/` and missing braces (brace typo) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Used `$PHP_VERSION-fpm` instead of `${PHP_VERSION}` (brace typo) |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 5      | Used `$APP_DIR` (brace typo) and misspelled target directory as `vendr` |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |

**Total Score:** 75/100 points