# Assessment No: 2

## Date: 2025-11-25 13:04:24

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Fully met                                                    |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Fully met                                                    |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Fully met                                                    |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Fully met                                                    |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | The command is `COPY ./site/composer.json ${APP_DIR}/`, an extra `/` is present |
| 6   | `RUN composer install`                                      | 10     | Fully met                                                    |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Fully met                                                    |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Fully met                                                    |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | The command is `COPY --from=builder ${APP_DIR}/vendor /var/www/html/vendor`, `${APP_DIR}` is used instead of `/composer` |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Fully met                                                    |

Total Score: 96/100 points