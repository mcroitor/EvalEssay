# Assessment No: 2

## Date: 2025-11-25 13:01:38

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | The student response does not define `COMPOSER_VERSION` and has incorrect syntax. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | The student response does not define `COMPOSER_VERSION` and the `FROM` command is missing. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | The student response does not set `APP_DIR`.                |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | The student response does not set `WORKDIR` to `APP_DIR`.   |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | The student response has incorrect `COPY` command syntax and does not reference `./site/composer.json`. |
| 6   | `RUN composer install`                                      | 0      | The student response does not run `composer install`.       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | The student response does not define `PHP_VERSION`.         |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | The student response does not define `PHP_VERSION` and the `FROM` command for PHP is missing. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | The student response does not copy from the builder image.  |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | The student response has incorrect `COPY` command syntax and does not reference `./site/`. |

Total Score: 0/100 points