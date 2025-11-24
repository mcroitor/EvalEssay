
| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  |        |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              |        |       |
| 3   | `ENV APP_DIR=/composer`                                     |        |       |
| 4   | `WORKDIR ${APP_DIR}`                                        |        |       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      |        |       |
| 6   | `RUN composer install`                                      |        |       |
| 7   | `ARG PHP_VERSION=8.1`                                       |        |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               |        |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` |        |       |
| 10  | `COPY ./site/ /var/www/html/`                               |        |       |

Total Score: [Put final score]/100 points
