# Assessment No: 9

## Date: 2025-11-25 13:26:14

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Fully met                                                    |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Missing curly braces around the variable name, but it works as expected |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Fully met                                                    |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Missing curly braces around the variable name, but it works as expected |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Missing a trailing slash, but the command works as expected |
| 6   | `RUN composer install`                                      | 10     | Fully met                                                    |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Fully met                                                    |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Missing curly braces around the variable name, but it works as expected |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 5      | Typo in the destination directory path (`/var/www/html/vendr` instead of `/var/www/html/vendor`) and missing curly braces around the variable name |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Fully met                                                    |

Total Score: 87/100 points