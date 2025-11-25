# Assessment No: 52

## Date: 2025-11-24 19:38:00

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct argument defined (though placed after FROM, order issue handled separately). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing `AS builder` and placed before the ARG, so the command is not as required. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct environment variable. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor syntax deviation). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added invalid `--builder` flag and incorrect path syntax. |
| 6   | `RUN composer install`                                      | 10     | Correct command. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct argument (order issue handled separately). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct base image. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies entire context (`.`) instead of `./site`. |
|     | **Total**                                                   | **60** | Deductions: 4 misplaced commands × 2 pts = 8 pts (68 pts − 8 pts). |