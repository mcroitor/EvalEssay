# Assessment No: 18

## Date: 2025-11-24 18:39:47

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Uses literal version instead of variable |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Misspelled command and variable (`WORK DIR $AP_DIR`) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Acceptable `$APP_DIR` syntax |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Uses literal version instead of variable |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct (variable resolves to same path) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |
|     | **Total**                                                   | **80** |       |

Total Score: 80/100 points