# Assessment No: 3

## Date: 2025-11-25 13:53:13

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with the specified version.                         |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used a hardcoded version instead of the build argument variable.      |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set as per requirement.                                     |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Typo in command (`WORK DIR $AP_DIR`). Incorrect syntax and variable.  |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, which is acceptable as a typo.|
| 6   | `RUN composer install`                                      | 10     | Correctly implemented without errors.                                 |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined with the specified version.                         |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly used the build argument variable for the base image.        |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path; should be `${APP_DIR}/vendor`.                 |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly implemented without errors.                                 |

Total Score: 66/100 points

Notes:
- Deduction of 2 points for the incorrect order in criterion 4 due to syntax error.
- Criterion 9 has a significant issue with the source path, leading to a full deduction.