# Assessment No: 57

## Date: 2025-11-24 19:47:18

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used `$COMPOSER_VERSION` instead of `${COMPOSER_VERSION}` (minor syntax variation) |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}` (minor syntax variation) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correct (trailing slash does not affect functionality) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used `$PHP_VERSION` instead of `${PHP_VERSION}` (minor syntax variation) |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Destination path misspelled as `vendr` (one typo) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |

**Total Score:** 92/100 points