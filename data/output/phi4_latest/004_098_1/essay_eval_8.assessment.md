# Assessment No: 8

## Date: 2025-11-25 13:56:45

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined as per the requirement.                             |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined with the build argument and alias.                  |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Defined correctly but placed before `ARG COMPOSER_VERSION`.           |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Correct command, but uses `$APP_DIR` instead of `${APP_DIR}`.         |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly defined with the right source and destination paths.        |
| 6   | `RUN composer install`                                      | 10     | Correct command for installing dependencies.                          |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined as per the requirement.                             |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly defined with the build argument.                            |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Incorrect source path; should be `${APP_DIR}/vendor`.                 |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly defined with the right source and destination paths.        |

Total Score: 82/100 points

Notes:
- Criterion 3 and 4 have minor issues due to incorrect order and syntax, resulting in a deduction of 2 points each.
- Criterion 9 has an error in the source path, leading to a deduction of 4 points.