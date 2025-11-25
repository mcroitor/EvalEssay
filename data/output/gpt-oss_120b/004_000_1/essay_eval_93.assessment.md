# Assessment No: 93

## Date: 2025-11-24 20:48:12

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Missing or incorrect ARG |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing FROM statement |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | ENV not defined |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | WORKDIR not set |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | COPY command incorrect |
| 6   | `RUN composer install`                                      | 0      | RUN command missing |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | PHP version ARG missing |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Final FROM statement missing |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | COPY from builder missing |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Final COPY missing |
|     | **Total**                                                   | **0**  |       |