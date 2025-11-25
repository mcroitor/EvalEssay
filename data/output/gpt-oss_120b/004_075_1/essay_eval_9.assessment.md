# Assessment No: 9

## Date: 2025-11-25 14:13:57

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Used literal tag `2.7` instead of `${COMPOSER_VERSION}` |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 5      | Typos: written as `WORK DIR` and variable misspelled `$AP_DIR` |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correct ( `$APP_DIR` is acceptable substitution ) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Used literal tag `8.1-fpm` instead of `${PHP_VERSION}` |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct (variable substitution works) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |
|     | **Total**                                                   | **75** |       |

Total Score: 75/100 points