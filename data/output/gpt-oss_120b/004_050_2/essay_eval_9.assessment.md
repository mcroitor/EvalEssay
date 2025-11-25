# Assessment No: 9

## Date: 2025-11-25 14:13:48

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Defined after the `FROM` line (misplaced), causing a 2‑point deduction. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Missing the `AS builder` alias and placed before the `ARG`; partially correct. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct declaration and placement. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` – minor syntax typo. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added invalid `--builder` flag and incorrect syntax; command not met. |
| 6   | `RUN composer install`                                      | 10     | Correct command. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Defined after the `FROM php` line (misplaced), 2‑point deduction. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Uses `PHP_VERSION` before it is defined; misplaced `ARG` leads to deduction. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source path; command not met. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies entire context (`.`) instead of `./site/`; command not met. |

**Total Score:** 57/100 points