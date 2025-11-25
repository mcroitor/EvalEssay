# Assessment No: 10

## Date: 2025-11-25 13:49:47

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Not present in the response |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Not present in the response |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Not present in the response |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Not present in the response |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Not present in the response |
| 6   | `RUN composer install`                                      | 0      | Present but out of order and missing dependencies |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Not present in the response |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Not present in the response |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Not present in the response |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Not present in the response |

Total Score: 0/100 points