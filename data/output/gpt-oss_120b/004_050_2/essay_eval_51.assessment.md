# Assessment No: 51

## Date: 2025-11-24 19:36:12

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct command, but placed after the first FROM (order issue noted separately). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the `AS builder` alias; command does not match the requirement. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct command. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` – functionally equivalent but not the exact syntax. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added an invalid `--builder` flag and syntax does not match the required command. |
| 6   | `RUN composer install`                                      | 10     | Correct command. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct command (order issue noted separately). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct command (order issue noted separately). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and uses wrong source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the entire context (`.`) instead of `./site/`. |

**Total Score:** 62/100 points