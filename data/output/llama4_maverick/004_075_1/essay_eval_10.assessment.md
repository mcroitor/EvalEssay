# Assessment No: 10

## Date: 2025-11-25 13:28:34

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Fully met                                                    |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | The command is correct but it should use `${COMPOSER_VERSION}` instead of hardcoding `2.7`. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Fully met                                                    |
| 4   | `WORKDIR ${APP_DIR}`                                        | 5      | The command is `WORK DIR` instead of `WORKDIR` and `$AP_DIR` instead of `${APP_DIR}`. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | The command has an extra `/` at the end.                     |
| 6   | `RUN composer install`                                      | 10     | Fully met                                                    |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Fully met                                                    |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Fully met                                                    |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | The command uses `${APP_DIR}` instead of the actual path `/composer`. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Fully met                                                    |

Total Score: 79/100 points