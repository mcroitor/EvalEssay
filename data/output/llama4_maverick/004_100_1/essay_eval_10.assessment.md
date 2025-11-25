# Assessment No: 10

## Date: 2025-11-25 13:29:22

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Fully met                                                    |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Missing curly braces around `$COMPOSER_VERSION`, but it still works |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Fully met                                                    |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Missing curly braces around `$APP_DIR`, but it still works  |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Missing trailing slash, but it still works                  |
| 6   | `RUN composer install`                                      | 10     | Fully met                                                    |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Fully met                                                    |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Missing curly braces around `$PHP_VERSION`, but it still works |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 5      | Typo in `/var/www/html/vendr`, should be `/var/www/html/vendor` |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Fully met                                                    |

Total Score: 87/100 points