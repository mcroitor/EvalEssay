# Assessment No: 45

## Date: 2025-11-24 19:26:30

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Placed before the builder `FROM`; order issue (-2) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Used `$APP_DIR` instead of `${APP_DIR}` – acceptable |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Used `$APP_DIR/` – acceptable |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Used `${APP_DIR}` variable – acceptable |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Extra `ENV APP_DIR` after this line is unnecessary (-2) |
|     | **Total**                                                   | **96** | 2 order violations → -4 points |

Total Score: 96/100 points