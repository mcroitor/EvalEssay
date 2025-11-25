# Assessment No: 6

## Date: 2025-11-24 18:19:33

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Placed before the first `FROM`; order issue (‑2 pts) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Used `$APP_DIR` which is functionally equivalent |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Trailing slash is acceptable |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses `${APP_DIR}` which expands correctly |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |
|     | **Total**                                                   | **96** | Deduction of 2 points for misplaced `ENV` before first `FROM`; another 2‑point deduction for extra `ENV` after second `FROM` (order issue) |