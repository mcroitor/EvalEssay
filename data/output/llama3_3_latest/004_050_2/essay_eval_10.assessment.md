# Assessment No: 10

## Date: 2025-11-25 13:50:23

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Incorrect order, should be before `FROM` command |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Missing `AS builder` and incorrect order |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Typo error, should be `${APP_DIR}` instead of `$APP_DIR` |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Incorrect syntax, should be `COPY ./site/composer.json ${APP_DIR}/` and incorrect order, missing `--from=builder` is not needed here but `./site/` should be used instead of `--builder` |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Incorrect order, should be before `FROM` command |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Missing correct order and syntax for `ARG` |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path, should be `/composer/vendor` and incorrect order, missing `--from=builder` is correct but the path is not |
| 10  | `COPY ./site/ /var/www/html/`                               | 8      | Correct but `./site/` will copy all files instead of specific files |

Total Score: 46/100 points