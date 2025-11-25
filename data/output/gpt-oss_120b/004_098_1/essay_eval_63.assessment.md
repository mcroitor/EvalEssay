# Assessment No: 63

## Date: 2025-11-24 19:57:20

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct and exact. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct and exact. |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Command is correct but placed before the builder `FROM` (misordered), resulting in a 2‑point deduction. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor syntax variation – counted as one typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR/` and includes a trailing slash – considered a single typo. |
| 6   | `RUN composer install`                                      | 10     | Correct and exact. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct and exact. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct and exact. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses `${APP_DIR}` which resolves to `/composer`; functionally correct. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct and exact. |
|     | **Total**                                                   | **94** | |

Total Score: 94/100 points