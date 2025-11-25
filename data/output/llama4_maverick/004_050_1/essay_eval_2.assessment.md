# Assessment No: 2

## Date: 2025-11-25 13:02:38

| Nr. | Criterion                                                   | Points | Notes                                      |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |                                            |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |                                            |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |                                            |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Should use ${APP_DIR} instead of $APP_DIR  |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Should not have a trailing slash /         |
| 6   | `RUN composer install`                                      | 0      | Missing command                            |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing command                            |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing command                            |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing command                            |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing command                            |

Total Score: 46/100 points