# Assessment No: 14

## Date: 2025-11-24 18:32:48

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct declaration, but placed after the FROM line (order issue). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the `AS builder` alias; command does not match required syntax. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Exact match. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor syntax deviation). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added an invalid `--builder` flag and uses `$APP_DIR/`; does not meet specification. |
| 6   | `RUN composer install`                                      | 10     | Exact match. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct declaration (order issue noted separately). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Exact match. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and incorrect source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the whole context (`.`) instead of `./site/`. |
|     | **Total**                                                   | **64** | Order deductions: -2 for misplaced `ARG COMPOSER_VERSION`, -2 for misplaced `ARG PHP_VERSION`. |