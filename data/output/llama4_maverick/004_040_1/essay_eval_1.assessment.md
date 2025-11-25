# Assessment No: 1

## Date: 2025-11-25 12:59:05

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Fully met                                                    |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | The command is correct but it should use the variable COMPOSER_VERSION instead of hardcoding the value |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Not met, missing command                                     |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Not met, missing command and depends on the missing ENV command |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | The command is correct but it should use the variable APP_DIR instead of hardcoding the value |
| 6   | `RUN composer install`                                      | 10     | Fully met                                                    |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Fully met                                                    |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Fully met                                                    |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Fully met                                                    |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Fully met                                                    |

Total Score: 76/100 points