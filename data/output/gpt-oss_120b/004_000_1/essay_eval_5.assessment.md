# Assessment No: 5

## Date: 2025-11-24 18:16:41

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Command missing; incorrect syntax (`ARG COMPOSER` instead of `ARG COMPOSER_VERSION=2.7`). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing entirely. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing entirely. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing entirely. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Missing entirely; provided `COPY . /` does not match required path. |
| 6   | `RUN composer install`                                      | 0      | Missing entirely. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing entirely. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing entirely. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing entirely. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing entirely. |

Total Score: 0/100 points