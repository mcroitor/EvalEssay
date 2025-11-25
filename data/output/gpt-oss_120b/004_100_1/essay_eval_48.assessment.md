# Assessment No: 48

## Date: 2025-11-24 19:31:45

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Uses `$COMPOSER_VERSION` (valid alternative) |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` (valid alternative) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Trailing slash on target is acceptable |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Uses `$PHP_VERSION` (valid alternative) |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Destination misspelled as “vendr” (one typo) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |

**Total Score:** 98/100 points