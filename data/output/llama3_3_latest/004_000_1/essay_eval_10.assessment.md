# Assessment No: 10

## Date: 2025-11-25 13:49:26

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Missing version number and incorrect syntax |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Not present in the student response        |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Not present in the student response        |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Not present in the student response        |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrect syntax and missing parts         |
| 6   | `RUN composer install`                                      | 0      | Not present in the student response        |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Not present in the student response        |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Not present in the student response        |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Not present in the student response        |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Incorrect syntax and missing parts         |

Total Score: 0/100 points