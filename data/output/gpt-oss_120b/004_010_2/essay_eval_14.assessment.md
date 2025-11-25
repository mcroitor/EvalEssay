# Assessment No: 14

## Date: 2025-11-24 18:32:14

| Nr. | Criterion                                                   | Points | Notes                                 |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Command not present.                  |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Command not present.                  |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Command not present.                  |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Command not present.                  |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Command not present.                  |
| 6   | `RUN composer install`                                      | 10     | Correct command, no errors.           |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Command not present.                  |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Command not present.                  |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Command not present.                  |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Command not present.                  |

**Total Score:** 10/100 points