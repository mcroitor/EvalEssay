# Assessment No: 4

## Date: 2025-11-25 13:08:56

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Fully met                                                    |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | The command is correct but it should use the variable COMPOSER_VERSION instead of hardcoding the value |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Not met, missing                                            |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Not met, missing and depends on the previous criterion      |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | The command is correct but it should use the variable APP_DIR instead of hardcoding the value |
| 6   | `RUN composer install`                                      | 10     | Fully met                                                    |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Fully met                                                    |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Fully met                                                    |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Fully met                                                    |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Fully met                                                    |

Total Score: 76/100 points