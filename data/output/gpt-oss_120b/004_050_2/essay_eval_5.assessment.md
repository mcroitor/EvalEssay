# Assessment No: 5

## Date: 2025-11-25 14:06:42

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Correct definition but placed **after** the FROM line (misplaced → -2 points). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing `AS builder` alias and placed before ARG; command not met. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Fully correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (one minor typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added invalid `--builder` flag and incorrect syntax; command not met. |
| 6   | `RUN composer install`                                      | 10     | Fully correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Correct definition but placed **after** the FROM line (misplaced → -2 points). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Correct syntax but uses `${PHP_VERSION}` before it is defined (misplaced → -2 points). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source path; command not met. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies entire context (`.`) instead of `./site`; command not met. |
|     | **Total**                                                   | **52** | |

**Total Score:** 52/100 points