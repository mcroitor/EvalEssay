# Assessment No: 2

## Date: 2025-11-25 13:33:41

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Typo: $APP_DIR instead of ${APP_DIR} |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Missing trailing slash in target directory |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Incorrect source directory, should be /composer/vendor instead of ${APP_DIR}/vendor |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

Total Score: 84/100 points