# Assessment No: 23

## Date: 2025-11-24 18:47:42

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax and value. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Uses literal `2.7` instead of the `${COMPOSER_VERSION}` variable (one typo). |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing entirely. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing entirely. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 3      | Uses literal `/composer` instead of `${APP_DIR}` (one typo) and is placed before the missing `WORKDIR` (misplaced, –2 points). |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Uses literal `8.1` instead of the `${PHP_VERSION}` variable (one typo). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct. |
|     | **Total**                                                   | **63** | |

Total Score: 63/100 points