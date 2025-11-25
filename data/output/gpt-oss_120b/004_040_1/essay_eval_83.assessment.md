# Assessment No: 83

## Date: 2025-11-24 20:30:52

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with default value. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Uses literal `composer:2.7` instead of the `${COMPOSER_VERSION}` variable. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Copies to `/composer` instead of `${APP_DIR}`; variable not used. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Uses literal `php:8.1-fpm` instead of the `${PHP_VERSION}` variable. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct. |
|     | **Total**                                                   | **58** | 2‑point deduction for the misplaced `COPY` command (expected after a `WORKDIR` that is missing). |

Total Score: 58/100 points