# Assessment No: 1

## Date: 2025-11-25 13:51:53

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set as per the requirement.                                 |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used a hardcoded version instead of using the build argument.         |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set as per the requirement.                                 |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Incorrect syntax used (`WORK DIR $AP_DIR`).                          |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, but it works in Docker.     |
| 6   | `RUN composer install`                                      | 10     | Correctly included as per the requirement.                           |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly set as per the requirement.                                 |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used a hardcoded version instead of using the build argument.         |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path; should be `${APP_DIR}/vendor`.                |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly included as per the requirement.                           |

Total Score: 64/100 points

Notes:
- Deduction of 2 points each for criteria 2 and 8 due to hardcoded version instead of using build arguments.
- Deduction of 10 points for criterion 4 due to incorrect syntax.
- Deduction of 10 points for criterion 9 due to incorrect source path.