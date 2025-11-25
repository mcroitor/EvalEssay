# Assessment No: 99

## Date: 2025-11-24 21:00:11

| Nr. | Criterion                                                   | Points | Notes                                 |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct                               |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used `$COMPOSER_VERSION` (missing braces) |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct                               |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` (missing braces)      |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR` (missing braces)      |
| 6   | `RUN composer install`                                      | 10     | Correct                               |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct                               |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used `$PHP_VERSION` (missing braces)  |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Variable braces missing and destination misspelled (`vendr`) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct                               |

**Total Score:** 82/100 points