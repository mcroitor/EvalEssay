# Assessment No: 11

## Date: 2025-11-24 18:27:46

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Present but placed after the `FROM` line (misordered, –2 pts) |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Missing the `AS builder` alias |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correct (`WORKDIR $APP_DIR` is functionally equivalent) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Uses an invalid `--builder` flag and incorrect syntax |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Present but placed after the `FROM php` line (misordered, –2 pts) |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | `PHP_VERSION` not defined before this `FROM`, so substitution fails |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and incorrect source path |
| 10  | `COPY ./site/ /var/www/html/`                               | 5      | Copies the whole context (`.`) instead of only `./site/` |

**Total Score:** 66/100 points