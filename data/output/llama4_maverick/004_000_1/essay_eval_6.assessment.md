# Assessment No: 6

## Date: 2025-11-25 13:14:34

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | The student response does not define `COMPOSER_VERSION` and its value. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | The student response does not define the base image for composer with the specified tag and name. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | The student response does not set the `APP_DIR` environment variable. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | The student response does not set the working directory to `APP_DIR`. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | The student response has a `COPY` command but it is incorrect and does not copy `composer.json` to `APP_DIR`. |
| 6   | `RUN composer install`                                      | 0      | The student response does not run `composer install`.       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | The student response does not define `PHP_VERSION` and its value. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | The student response does not define the base image for PHP with the specified tag. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | The student response does not copy the `vendor` directory from the builder image. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | The student response has a `COPY` command but it is incorrect and does not copy files from `./site` to `/var/www/html`. |

Total Score: 0/100 points