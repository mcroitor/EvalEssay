# Assessment No: 5

## Date: 2025-11-25 13:12:40

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | The `ARG COMPOSER_VERSION=2.7` should be before `FROM composer:${COMPOSER_VERSION}`. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Missing `AS builder`. Typo error.                            |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |                                                              |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Missing curly braces. Typo error.                            |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Incorrect flag `--builder` and extra `/` at the end. Typo error. |
| 6   | `RUN composer install`                                      | 10     |                                                              |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | The `ARG PHP_VERSION=8.1` should be before `FROM php:${PHP_VERSION}-fpm`. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |                                                              |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Missing `--from=builder`. Typo error.                        |
| 10  | `COPY ./site/ /var/www/html/`                               | 8      | Incorrect source directory. Typo error.                     |

Total Score: 60/100 points