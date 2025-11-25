# Assessment No: 99

## Date: 2025-11-24 20:59:14

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct value, but placed **after** the FROM line (misplaced). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing `AS builder` alias; command does not match required syntax. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor syntax deviation). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added invalid `--builder` flag and incorrect syntax. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct value, but placed **after** the FROM line (misplaced). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies entire context (`.`) instead of `./site/`. |
|     | **Total**                                                   | **54** | (58 points – 4 points for two misplaced ARG commands) |