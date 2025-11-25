# Assessment No: 7

## Date: 2025-11-25 13:55:53

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | The argument is defined but placed after the first FROM statement, which is incorrect order. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | The base image line is missing the ARG substitution and named as builder. Also misplaced in order. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly defined without errors.                                      |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}`, which is a minor typo error.  |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrect command used (`COPY --builder`) and misplaced in order.     |
| 6   | `RUN composer install`                                      | 10     | Correctly defined without errors.                                      |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | The argument is defined but placed after the first FROM statement, which is incorrect order. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing ARG substitution and misplaced in order.                      |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Misplaced in order, incorrect source path (`/composer/vendor`).        |
| 10  | `COPY ./site/ /var/www/html/`                               | 8      | Uses `. /var/www/html/` instead of `./site/ /var/www/html/`, which is a minor typo error. |

Total Score: 52/100 points

Notes:
- Misplaced commands result in additional deductions.
- Correct order and syntax are crucial for Dockerfile functionality.