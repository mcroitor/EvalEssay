# Assessment No: 93

## Date: 2025-11-24 20:48:59

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct value but placed after the `FROM` line (order issue). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the `AS builder` alias; also appears before the ARG. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` instead of `${APP_DIR}` – functionally equivalent. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added invalid `--builder` flag and path syntax differs from required. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct value but placed after the `FROM php` line (order issue). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct syntax but appears before the corresponding ARG (order issue). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and source path does not match specification. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the whole context (`.`) instead of `./site/`. |
|     | **Total**                                                   | **70** | Order penalties: 4 misplaced commands × 2 pts = 8 pts deduction. |
|     | **Final Score**                                             | **62** | 62/100 points. |