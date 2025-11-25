# Assessment No: 31

## Date: 2025-11-24 19:01:39

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax, but placed **after** the FROM line (order issue). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the `AS builder` alias; command does not match required form. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` – a minor syntax deviation (one typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added invalid `--builder` flag and incorrect syntax; does not meet requirement. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct syntax, but placed **after** the FROM line (order issue). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source path; does not meet requirement. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Source directory is `.` instead of `./site/`. |

**Total Score:** 64/100 points