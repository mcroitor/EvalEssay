# Assessment No: 24

## Date: 2025-11-24 18:49:56

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax but placed after the FROM line (misplaced). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the `AS builder` alias; command does not match required form. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Includes invalid `--builder` flag and uses `$APP_DIR/`; does not match required command. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct syntax but placed after the FROM php line (misplaced). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct syntax but placed before the ARG PHP_VERSION (misplaced). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder`, wrong source path and destination; does not meet requirement. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies `.` instead of `./site/`; does not meet requirement. |
|     | **Total**                                                   | **60** |       |

Total Score: 60/100 points