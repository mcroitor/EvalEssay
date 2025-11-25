# Assessment No: 88

## Date: 2025-11-24 20:39:24

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly provided. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing entirely. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing entirely. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing entirely. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrect COPY command; does not specify source file or destination. |
| 6   | `RUN composer install`                                      | 0      | Missing entirely. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing entirely. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing entirely. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing entirely. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Incorrect COPY command; does not match required syntax. |
|     | **Total**                                                   | **10** | **Total Score: 10/100 points** |