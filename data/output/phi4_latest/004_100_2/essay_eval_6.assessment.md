# Assessment No: 6

## Date: 2025-11-25 13:55:30

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     |       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Extra slash in path. Should be `${APP_DIR}/`. |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 5      | Incorrect source path `/composer/vendor`. Should be `${APP_DIR}/vendor`. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

Total Score: 83/100 points

Notes:
- Criterion 5 has a minor typo with an extra slash, resulting in a deduction of 2 points.
- Criterion 9 has a significant error in the source path, leading to a deduction of 5 points.