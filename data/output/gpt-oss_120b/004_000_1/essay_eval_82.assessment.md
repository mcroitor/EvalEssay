# Assessment No: 82

## Date: 2025-11-24 20:28:51

| Nr. | Criterion                                                   | Points | Notes                         |
| --- | ----------------------------------------------------------- | ------ | ----------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Command missing or incorrect |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Command missing or incorrect |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Command missing or incorrect |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Command missing or incorrect |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Command missing or incorrect |
| 6   | `RUN composer install`                                      | 0      | Command missing or incorrect |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Command missing or incorrect |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Command missing or incorrect |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Command missing or incorrect |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Command missing or incorrect |
|     | **Total**                                                   | **0**  |                               |

Total Score: 0/100 points