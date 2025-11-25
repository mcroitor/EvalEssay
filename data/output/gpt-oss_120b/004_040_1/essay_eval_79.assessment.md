# Assessment No: 79

## Date: 2025-11-24 20:24:00

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Used literal `2.7` instead of the variable. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Missing; used hard‑coded path and did not reference `APP_DIR`. |
| 6   | `RUN composer install`                                      | 8      | Command present, but misplaced because required `WORKDIR` is absent. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Used literal `8.1-fpm` instead of the variable. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correctly defined. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly defined. |
|     | **Total**                                                   | **58** | |

Total Score: 58/100 points