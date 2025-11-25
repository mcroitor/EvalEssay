# Assessment No: 1

## Date: 2025-11-25 13:31:55

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     |       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Typo: extra slash in original (`${APP_DIR}/`) |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Typo: incorrect path in original (`${APP_DIR}/vendor`) |
| 10  | `COPY ./site/ /var/www/html/`                               | 8      | Typo: extra slash in original (`./site/ /var/www/html/`) |

Total Score: 94/100 points