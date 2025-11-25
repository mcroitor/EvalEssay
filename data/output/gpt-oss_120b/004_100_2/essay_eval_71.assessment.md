# Assessment No: 71

## Date: 2025-11-24 20:11:29

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct syntax |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct syntax |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correct syntax |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Trailing slash after `${APP_DIR}` is a minor typo |
| 6   | `RUN composer install`                                      | 10     | Correct syntax |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct syntax |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct syntax |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses variable `${APP_DIR}` which resolves to `/composer`; functionally correct |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct syntax |

**Total Score:** 98/100 points