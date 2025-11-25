# Assessment No: 5

## Date: 2025-11-25 13:12:07

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Fully met                                                    |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Missing variable, hardcoded value instead                   |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Not implemented                                              |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Not implemented, depends on ENV APP_DIR                     |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Hardcoded /composer instead of ${APP_DIR}                   |
| 6   | `RUN composer install`                                      | 10     | Fully met                                                    |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Fully met                                                    |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Fully met                                                    |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Fully met                                                    |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Fully met                                                    |

Total Score: 63/100 points