# Assessment No: 7

## Date: 2025-11-24 18:21:21

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | correct syntax, but appears after an ENV (misplaced – ‑2) |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | correct syntax, but appears before the FROM (misplaced – ‑2) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | used `$APP_DIR` instead of `${APP_DIR}` (minor typo) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | used `$APP_DIR/` and missing braces (minor typo) |
| 6   | `RUN composer install`                                      | 10     | correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | correct |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | uses `${APP_DIR}` which resolves to `/composer` – correct |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | correct |

**Total Score:** 92/100 points