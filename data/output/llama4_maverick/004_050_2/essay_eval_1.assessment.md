# Assessment No: 1

## Date: 2025-11-25 12:59:40

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | The `ARG COMPOSER_VERSION=2.7` should be before `FROM composer:${COMPOSER_VERSION}` |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Missing `AS builder`, typo error                             |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |                                                              |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Missing `{}` around `APP_DIR`, typo error                   |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Incorrect flag `--builder`, should be no flag or correct context, and missing `/` at the end |
| 6   | `RUN composer install`                                      | 10     |                                                              |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | `ARG PHP_VERSION=8.1` should be before `FROM php:${PHP_VERSION}-fpm` |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Missing `{}` around `PHP_VERSION`, typo error               |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Missing `--from=builder` flag and incorrect source path     |
| 10  | `COPY ./site/ /var/www/html/`                               | 5      | Incorrect source directory `./site/`                        |

Total Score: 55/100 points