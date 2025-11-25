# Assessment No: 58

## Date: 2025-11-24 19:48:45

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct and exact. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Correct syntax but placed after an `ENV` line (misordered, –2 points). |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Correct value but appears before the `FROM` statement (misordered, –2 points). |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (one typo, –2 points). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR/` and missing braces (one typo, –2 points). |
| 6   | `RUN composer install`                                      | 10     | Exact command, no errors. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct and exact. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct and exact. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Uses `${APP_DIR}` instead of literal path (one typo, –2 points). |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct and exact. |
|     | **Total**                                                   | **90** | |

Total Score: 90/100 points