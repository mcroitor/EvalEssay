# Assessment No: 89

## Date: 2025-11-24 20:42:52

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct syntax |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct syntax |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correct syntax |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Trailing slash after `${APP_DIR}` is a minor deviation |
| 6   | `RUN composer install`                                      | 10     | Correct syntax |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct syntax |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct syntax |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Uses variable `${APP_DIR}` instead of literal path; functionally correct but deviates from expected command |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct syntax |
|     | **Total**                                                   | **96** |       |

Total Score: 96/100 points