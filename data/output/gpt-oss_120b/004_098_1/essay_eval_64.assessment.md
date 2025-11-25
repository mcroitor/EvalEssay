# Assessment No: 64

## Date: 2025-11-24 19:59:00

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | First occurrence placed before the builder `FROM` (order issue). |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}` (minor syntax difference). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR/` with trailing slash (minor syntax difference). |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Used `${APP_DIR}` variable which expands correctly. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Extra `ENV APP_DIR` after second `FROM` is a misplaced command. |
|     | **Total**                                                   | **92** | Deduction of 4 points for two misplaced commands (‑2 pts each). |

**Total Score:** 92/100 points