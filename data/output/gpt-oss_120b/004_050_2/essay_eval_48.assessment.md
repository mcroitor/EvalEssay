# Assessment No: 48

## Date: 2025-11-24 19:30:58

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Correct syntax but placed after the `FROM` line (misplaced → –2). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the `AS builder` alias; command does not match the requirement. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Fully correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor syntax deviation). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added an invalid `--builder` flag and path does not match the required source. |
| 6   | `RUN composer install`                                      | 10     | Fully correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Correct syntax but placed after the `FROM php` line (misplaced → –2). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Correct syntax but appears before its `ARG` definition (misplaced → –2). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and source path does not match the requirement. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the whole context (`.`) instead of `./site/`. |

**Total Score:** 60/100 points