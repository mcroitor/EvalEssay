# Assessment No: 7

## Date: 2025-11-25 13:56:08

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used `$COMPOSER_VERSION` instead of `${COMPOSER_VERSION}` (one typo error). |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}` (one typo error). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 9      | Used `$APP_DIR/` instead of `${APP_DIR}` (one typo error). |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used `$PHP_VERSION-fpm` instead of `${PHP_VERSION}-fpm` (one typo error). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 7      | Used `/var/www/html/vendr` instead of `/var/www/html/vendor` (typo error) and used `$APP_DIR/vendor` instead of `/composer/vendor` (one typo error). |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

Total Score: 82/100 points

Notes:
- Deduction for command order was not applied as all commands are in the correct sequence.
- Typo errors were noted where applicable, with deductions made according to the rubric.