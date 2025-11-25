# Assessment No: 18

## Date: 2025-11-24 18:39:36

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Command present but placed after the `FROM` line (misplaced → –2 points). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the `AS builder` alias and uses the argument before it is defined. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct syntax and correctly positioned. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (one minor typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrect flag `--builder` and wrong source path; does not match required command. |
| 6   | `RUN composer install`                                      | 10     | Correct command. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Command present but placed after the `FROM php` line (misplaced → –2 points). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Correct command but appears before the `ARG PHP_VERSION` (misplaced → –2 points). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the whole context (`.`) instead of `./site/`. |

**Total Score:** 60/100 points