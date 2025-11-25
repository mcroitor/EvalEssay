# Assessment No: 44

## Date: 2025-11-24 19:23:46

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Missing entirely. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing entirely. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing entirely. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing entirely. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Missing entirely. |
| 6   | `RUN composer install`                                      | 8      | Command is correct but placed out of order (‑2 points). |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing entirely. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing entirely. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing entirely. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing entirely. |
|     | **Total**                                                   | **8**  |       |

Total Score: 8/100 points