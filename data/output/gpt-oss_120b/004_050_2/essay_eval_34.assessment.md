# Assessment No: 34

## Date: 2025-11-24 19:06:55

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Correct syntax but placed after the `FROM` line, so the argument is not available for the preceding `FROM`. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the `AS builder` alias; also uses the undefined argument because of ordering. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct and properly placed. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added an invalid `--builder` flag, used `$` syntax, and path does not match the required source. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Correct syntax but placed after the `FROM php` line, so it cannot be used for that `FROM`. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct syntax (though the variable is not defined at this point). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and incorrect source/target paths. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the whole context (`.`) instead of the `./site/` directory. |

**Total Score:** 62/100 points