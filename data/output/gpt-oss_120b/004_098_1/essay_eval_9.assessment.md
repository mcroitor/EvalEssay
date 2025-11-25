# Assessment No: 9

## Date: 2025-11-25 14:14:24

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct and in proper position. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Command correct but placed after `ENV`, so misplaced (‑2). |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Correct value but appears before the builder `FROM`; misplaced (‑2). |
| 4   | `WORKDIR ${APP_DIR}`                                        | 6      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor typo) and is out of order (‑2). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 6      | Uses `$APP_DIR/` and trailing slash (minor typo) and is out of order (‑2). |
| 6   | `RUN composer install`                                      | 8      | Correct command but misplaced (‑2). |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct and correctly positioned. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct and correctly positioned. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses `${APP_DIR}` which resolves correctly; order is fine. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct and correctly positioned. |
|     | **Total**                                                   | **86** | |

**Total Score:** 86/100 points