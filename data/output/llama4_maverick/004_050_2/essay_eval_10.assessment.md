# Assessment No: 10

## Date: 2025-11-25 13:28:17

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | The `ARG COMPOSER_VERSION=2.7` should be before `FROM composer:${COMPOSER_VERSION}` |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Missing `AS builder`, correct order issue                   |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Fully met                                                    |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | `$APP_DIR` should be `${APP_DIR}`, typo error                |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | `$APP_DIR/` should be `${APP_DIR}`, typo error; `--builder` is incorrect, should be `--from=builder` but it's not applicable here as it's a single-stage context at the point of this command |
| 6   | `RUN composer install`                                      | 10     | Fully met                                                    |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | `ARG PHP_VERSION=8.1` should be before `FROM php:${PHP_VERSION}-fpm` |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Correct, but order issue with `ARG PHP_VERSION=8.1`         |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | The source path is correct, but the command is misplaced and uses incorrect syntax (`${APP_DIR}/vendor` should be used but the main issue is the stage context) |
| 10  | `COPY ./site/ /var/www/html/`                               | 8      | `COPY . /var/www/html/` should be `COPY ./site/ /var/www/html/`, incorrect directory |
|     |                                                             |        |                                                              |
| Total Score: 58/100 points                                  |