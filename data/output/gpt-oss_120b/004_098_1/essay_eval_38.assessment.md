# Assessment No: 38

## Date: 2025-11-24 19:14:29

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct (misplaced order – ‑2 pts later) |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct (misplaced order – ‑2 pts later) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}` (one typo) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Used `$APP_DIR/` and missing braces (two typos) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Used `${APP_DIR}` variable instead of literal path (one typo) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |
|     | **Total**                                                   | **87** | 91 points earned minus 4 points for two commands out of order |

Total Score: 87/100 points