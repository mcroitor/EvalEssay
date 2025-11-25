# Assessment No: 29

## Date: 2025-11-24 18:58:54

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct and in proper position. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Command correct but placed after an `ENV` line (misordered, –2). |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Correct command but appears before the `FROM` line (misordered, –2). |
| 4   | `WORKDIR ${APP_DIR}`                                        | 6      | Uses `$APP_DIR` instead of `${APP_DIR}` (one typo) and is out of order relative to the misplaced `ENV` (–2). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Uses `$APP_DIR/` (different variable syntax) and adds a trailing slash – two minor errors (≤3 typos → 5 points). |
| 6   | `RUN composer install`                                      | 10     | Exact match, correct order. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Exact match, correct order. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Exact match, correct order. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses `${APP_DIR}` which resolves to `/composer`; functionally identical, no errors. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Exact match, correct order. |
|     | **Total**                                                   | **87** | |

**Total Score:** 87/100 points