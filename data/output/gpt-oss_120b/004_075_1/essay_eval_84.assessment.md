# Assessment No: 84

## Date: 2025-11-24 20:33:08

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Used literal `2.7` instead of the `${COMPOSER_VERSION}` variable |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 5      | Typo in command (`WORK DIR`) and variable name (`$AP_DIR`) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correct (using `$APP_DIR/` is acceptable) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Used literal `8.1-fpm` instead of the `${PHP_VERSION}` variable |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct (uses `${APP_DIR}` which resolves to `/composer`) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |
|     | **Total**                                                   | **75** |       |

Total Score: 75/100 points