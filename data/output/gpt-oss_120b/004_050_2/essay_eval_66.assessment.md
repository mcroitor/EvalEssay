# Assessment No: 66

## Date: 2025-11-24 20:01:49

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct value, but placed after the FROM line (order issue). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the `AS builder` alias. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrect flag `--builder` and path; does not match required command. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct value, but placed after the FROM line (order issue). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the wrong directory (`.` instead of `./site`). |
|     | **Total**                                                   | **64** | Deductions: -2 for misplaced `ARG COMPOSER_VERSION`, -2 for misplaced `ARG PHP_VERSION`. |

**Total Score:** 64/100 points