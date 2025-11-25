# Assessment No: 60

## Date: 2025-11-24 19:51:07

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Uses literal `composer:2.7` instead of the variable; partially meets requirement. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Copies to `/composer` but does not use `${APP_DIR}` as specified. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Uses literal `php:8.1-fpm` instead of the variable; partially meets requirement. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct. |
|     | **Total (before order penalty)**                            | **70** | |
|     | Order penalty (misplaced `COPY ./site/composer.json`)       | **-2** | Command appears before missing `ENV`/`WORKDIR`; 2‑point deduction. |
|     | **Final Total Score**                                       | **68** | |

Total Score: 68/100 points