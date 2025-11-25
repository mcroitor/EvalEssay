# Assessment No: 33

## Date: 2025-11-24 19:05:10

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax but placed after the FROM line (misplaced). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing `AS builder` alias; command does not match required form. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` which is functionally equivalent; no typo. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Uses invalid `--builder` flag and incorrect syntax; does not match required command. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct syntax but placed after the FROM line (misplaced). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct form; however the preceding ARG is misplaced, affecting usage. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and incorrect source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the whole context (`.`) instead of `./site/`. |
|     | **Total**                                                   | **66** | Deduction of 4 points for two misplaced ARG commands (2 pts each). |

**Total Score:** 66/100 points