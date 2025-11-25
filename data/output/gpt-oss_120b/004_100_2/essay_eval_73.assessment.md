# Assessment No: 73

## Date: 2025-11-24 20:14:57

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     |       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Trailing “/” after `${APP_DIR}` (minor typo). |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Uses `${APP_DIR}` variable instead of literal path (minor deviation). |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |
|     | **Total**                                                   | **96** |       |

Total Score: 96/100 points