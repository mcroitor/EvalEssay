# Assessment No: 96

## Date: 2025-11-24 20:54:12

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct value but placed after the `FROM` line (order issue). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Missing the `AS builder` alias. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` which is acceptable. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Added an invalid `--builder` flag; otherwise source/path are correct. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct value but placed after the `FROM php` line (order issue). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Syntax correct; variable defined later, causing order problem. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and incorrect source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 5      | Copies the whole context (`.`) instead of `./site/`. |
|     | **Total**                                                   | **71** | Deducted 4 points for misplaced `ARG` statements (2 pts each). |