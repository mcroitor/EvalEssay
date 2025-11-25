# Assessment No: 76

## Date: 2025-11-24 20:19:57

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Command correct but placed after `ENV` (misplaced – 2 pts) |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Command correct but placed before `FROM` (misplaced – 2 pts) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 6      | Uses `$APP_DIR` instead of `${APP_DIR}` (one typo) and is misplaced (‑2 pts) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR/` instead of `${APP_DIR}` (one typo) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct (uses variable `${APP_DIR}` which resolves to `/composer`) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |

**Total Score:** 90/100 points