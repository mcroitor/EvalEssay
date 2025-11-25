# Assessment No: 55

## Date: 2025-11-24 19:43:43

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct value but placed before the first FROM (misordered) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | `$APP_DIR` is equivalent to `${APP_DIR}` |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Trailing slash in destination is acceptable |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses `${APP_DIR}` which expands to `/composer` |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |
|     | **Total**                                                   | **98** | 2‑point deduction for the misplaced `ENV APP_DIR` before the first FROM |