# Assessment No: 8

## Date: 2025-11-25 13:45:52

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Typo: ${APP_DIR} should be used for consistency, but $APP_DIR is also valid in this context. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Same as above, $APP_DIR is used instead of ${APP_DIR}. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Trailing slash missing in the target directory. Should be ${APP_DIR}/ for consistency. |
| 6   | `RUN composer install`                                      | 0      | Missing from the student's response. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing from the student's response. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing from the student's response. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing from the student's response. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing from the student's response. |

Total Score: 44/100 points