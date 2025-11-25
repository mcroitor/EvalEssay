# Assessment No: 69

## Date: 2025-11-24 20:07:55

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used `$COMPOSER_VERSION` instead of `${COMPOSER_VERSION}` (one minor typo). |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` without braces (one minor typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR/` and omitted braces (one minor typo). |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used `$PHP_VERSION` without braces (one minor typo). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 5      | Two issues: used `$APP_DIR` without braces and misspelled destination `vendr` (two typos). |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct. |

**Total Score:** 87/100 points