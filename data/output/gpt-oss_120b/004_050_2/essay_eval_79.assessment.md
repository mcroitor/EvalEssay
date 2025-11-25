# Assessment No: 79

## Date: 2025-11-24 20:24:28

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax, but placed **after** the `FROM` line (order issue). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing `AS builder` alias; command does not match required form. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` instead of `${APP_DIR}` – functionally equivalent. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Uses invalid `--builder` flag and incorrect syntax. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct syntax, but placed **after** the `FROM php` line (order issue). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies entire context (`.`) instead of `./site/`. |
|     | **Total**                                                   | **62** | Deducted 8 points for four misplaced commands (criteria 1, 2, 7, 8). |

**Total Score:** 62/100 points