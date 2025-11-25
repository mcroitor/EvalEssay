# Assessment No: 8

## Date: 2025-11-25 14:12:38

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax, no errors. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Correct, but placed after `ENV` (misordered – ‑2 points). |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Correct, but placed before the `FROM` statement (misordered – ‑2 points). |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correct syntax (`$APP_DIR` is acceptable) and in proper order. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correct command (trailing slash does not affect correctness). |
| 6   | `RUN composer install`                                      | 10     | Correct command. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct syntax, correctly positioned. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct syntax and order. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Correct command, but appears after an extra `ENV` line (misordered – ‑2 points). |
| 10  | `COPY ./site/ /var/www/html/`                               | 8      | Correct command, but misordered due to the extra `ENV` line (‑2 points). |

**Total Score:** 92/100 points