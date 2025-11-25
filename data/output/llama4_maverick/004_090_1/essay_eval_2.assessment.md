# Assessment No: 2

## Date: 2025-11-25 13:03:33

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Fully met                                                    |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Fully met                                                    |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Fully met                                                    |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Missing curly braces around APP_DIR, but the command works as expected |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Missing trailing slash, but the command works as expected   |
| 6   | `RUN composer install`                                      | 10     | Fully met                                                    |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Fully met                                                    |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Fully met                                                    |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | The source path is incorrectly specified as ${APP_DIR}/vendor instead of /composer/vendor |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Fully met                                                    |

Total Score: 84/100 points