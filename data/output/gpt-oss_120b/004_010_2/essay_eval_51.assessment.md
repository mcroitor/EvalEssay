# Assessment No: 51

## Date: 2025-11-24 19:35:39

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Missing |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Missing |
| 6   | `RUN composer install`                                      | 8      | Command present and correct; deducted 2 points for being out of order |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing |
|     | **Total**                                                   | **8**  |       |

Total Score: 8/100 points