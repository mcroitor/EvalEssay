# Assessment No: 13

## Date: 2025-11-24 18:31:41

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Command correct but placed after `ENV`, so 2‑point order penalty |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Correct command but appears before the `FROM builder` line; 2‑point order penalty |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (one typo) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR/` and trailing slash (one typo) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Uses `${APP_DIR}` variable instead of literal path (one typo) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |

**Total Score:** 90/100 points