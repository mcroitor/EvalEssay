# Assessment No: 8

## Date: 2025-11-25 13:56:52

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Typo: Missing `${}` around `APP_DIR`. Should be `WORKDIR ${APP_DIR}`. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     |       |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Error: Should copy from `${APP_DIR}/vendor`. Correct command is `COPY --from=builder ${APP_DIR}/vendor /var/www/html/vendor`. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

Total Score: 78/100 points

Notes:
- Criterion 4 has a minor typo with missing `${}` around the variable, resulting in a deduction of 2 points.
- Criterion 9 is not met due to an incorrect path for copying dependencies, leading to a full deduction of 10 points.