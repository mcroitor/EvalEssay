# Assessment No: 74

## Date: 2025-11-24 20:16:31

| Nr. | Criterion                                                   | Points | Notes                                 |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |                                       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used `$COMPOSER_VERSION` without braces |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |                                       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     |                                       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     |                                       |
| 6   | `RUN composer install`                                      | 10     |                                       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |                                       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used `$PHP_VERSION` without braces |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Destination typo: “vendr” instead of “vendor” |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |                                       |
|     | **Total**                                                   | **94** |                                       |

Total Score: 94/100 points