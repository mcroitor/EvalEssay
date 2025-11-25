# Assessment No: 55

## Date: 2025-11-24 19:43:09

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct line, but placed after the FROM statement (order issue). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the `AS builder` alias; command does not match required syntax. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` instead of `${APP_DIR}` – both are valid, no typo. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrect flag `--builder` and wrong destination syntax; does not meet requirement. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct line, but placed after the FROM statement (order issue). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Syntax correct; however PHP_VERSION is not defined before use. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source path; does not meet requirement. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies `.` instead of `./site/`; does not meet requirement. |
|     | **Total**                                                   | **66** | Deduction of 4 points for two misplaced ARG commands (2 pts each). |

**Total Score:** 66/100 points