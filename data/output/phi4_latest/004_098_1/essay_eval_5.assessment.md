# Assessment No: 5

## Date: 2025-11-25 13:54:43

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with no errors.                                     |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined and named as builder, no errors.                    |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set to `/composer`, no errors.                              |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, one typo error.              |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly copied, no errors.                                          |
| 6   | `RUN composer install`                                      | 10     | Correctly executed, no errors.                                        |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined with no errors.                                     |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly defined, no errors.                                         |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Used `/composer/vendor` instead of `${APP_DIR}/vendor`, one typo error and misplaced command (deduction for order). |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copied, no errors.                                          |

Total Score: 84/100 points

Notes:
- Deduction of 2 points applied to criterion 9 due to misplaced command.
- Criterion 4 had one typo error with `$APP_DIR` instead of `${APP_DIR}`.