# Assessment No: 20

## Date: 2025-11-24 18:42:28

| Nr. | Criterion                                                   | Points | Notes                         |
| --- | ----------------------------------------------------------- | ------ | ----------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Command missing               |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Command missing               |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Command missing               |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Command missing               |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Command missing               |
| 6   | `RUN composer install`                                      | 0      | Present but not in correct context; other required steps missing |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Command missing               |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Command missing               |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Command missing               |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Command missing               |

Total Score: 0/100 points