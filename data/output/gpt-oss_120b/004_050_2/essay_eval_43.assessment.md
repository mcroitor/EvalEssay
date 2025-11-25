# Assessment No: 43

## Date: 2025-11-24 19:22:40

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct value, but placed after the FROM line (misordered). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the `AS builder` alias; also appears before the ARG definition. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` instead of `${APP_DIR}` – both are valid. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Uses an invalid `--builder` flag and incorrect syntax. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct value, but placed after the FROM line (misordered). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Syntax correct, but the ARG it relies on is defined later (misordered). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the whole context (`.`) instead of `./site/`. |
|     | **Total**                                                   | **62** | Deduction of 8 points for four misordered commands (2 pts each). |

**Total Score:** 62/100 points