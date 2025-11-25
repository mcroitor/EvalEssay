# Assessment No: 34

## Date: 2025-11-24 19:07:32

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct (but placed after an ENV, order issue) |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct (first occurrence misplaced) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor typo) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR/` and missing braces (minor typo) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses `${APP_DIR}` which expands correctly |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |
|     | **Total (before order penalties)**                          | **96** | |
|     | Order penalties (3 misplaced commands × 2 pts)             | **‑6** | |
|     | **Total Score**                                             | **90** | 90/100 points |