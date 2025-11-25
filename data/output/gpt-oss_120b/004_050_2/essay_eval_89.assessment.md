# Assessment No: 89

## Date: 2025-11-24 20:41:49

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct value but placed after the FROM line (misplaced). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the `AS builder` alias. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (one typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added invalid `--builder` flag and incorrect syntax. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct value but placed after the FROM line (misplaced). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct, but order is wrong (should precede ARG). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies whole context (`.`) instead of `./site`. |
|     | **Total (before order penalties)**                          | **68** | |
|     | **Order penalty (7 misplaced commands × 2 pts)**           | **‑14**| |
|     | **Total Score**                                             | **54** | |

**Total Score: 54/100 points**