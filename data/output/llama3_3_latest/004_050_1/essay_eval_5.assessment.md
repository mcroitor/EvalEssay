# Assessment No: 5

## Date: 2025-11-25 13:39:25

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Typo: ${APP_DIR} should be used for consistency, but $APP_DIR is also valid in this context. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Same typo as above, but since $APP_DIR is used, it's considered a minor error. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Trailing slash in the original command ($APP_DIR/), not exactly matching the required format. |
| 6   | `RUN composer install`                                      | 0      | Not present in the student's response. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Not present in the student's response. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Not present in the student's response. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Not present in the student's response. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Not present in the student's response. |

Total Score: 44/100 points