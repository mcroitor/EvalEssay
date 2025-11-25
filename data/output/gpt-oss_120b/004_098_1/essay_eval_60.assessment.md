# Assessment No: 60

## Date: 2025-11-24 19:52:21

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct (misplaced in order) |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct (misplaced in order) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}` (one typo) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR/` and trailing slash (one typo) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct (uses variable instead of literal) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |
|     | **Total**                                                   | **90** | 96 points earned minus 6 points for three commands out of order (ENV, FROM builder, COPY vendor) |