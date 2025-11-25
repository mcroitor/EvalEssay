# Assessment No: 6

## Date: 2025-11-25 13:41:46

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Incorrect order, should be before `FROM` command |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Missing `AS builder` and incorrect order |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Typo error, `$APP_DIR` should be `${APP_DIR}` |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Incorrect syntax, `--builder` is not needed and incorrect order |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Incorrect order, should be before `FROM` command |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Missing `ARG` definition and incorrect order |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect syntax, missing `--from=builder` and incorrect source directory |
| 10  | `COPY ./site/ /var/www/html/`                               | 5      | Incorrect syntax, `./site/` should be `./site` and incorrect order |

Total Score: 48/100 points