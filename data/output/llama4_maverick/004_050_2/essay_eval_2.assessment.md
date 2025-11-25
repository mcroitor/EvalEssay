# Assessment No: 2

## Date: 2025-11-25 13:02:57

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | The `ARG COMPOSER_VERSION=2.7` should be before `FROM composer:${COMPOSER_VERSION}` |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Missing `AS builder`, correct order issue                   |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Fully met                                                    |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | `$APP_DIR` should be `${APP_DIR}`                            |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | `$APP_DIR/` should be `${APP_DIR}`, and `--builder` is incorrect |
| 6   | `RUN composer install`                                      | 10     | Fully met                                                    |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | `ARG PHP_VERSION=8.1` should be before `FROM php:${PHP_VERSION}-fpm` |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Correct order issue                                         |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Missing `--from=builder`, incorrect source path `/composer/vendor` |
| 10  | `COPY ./site/ /var/www/html/`                               | 8      | Incorrect source directory `./site/`                        |

Total Score: 58/100 points