# Assessment No: 7

## Date: 2025-11-25 13:55:57

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set as per the requirement.                                 |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used a hardcoded version instead of using the build argument.         |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set as per the requirement.                                 |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Typo in command (`WORK DIR $AP_DIR`). Incorrect variable usage.       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly set as per the requirement.                                 |
| 6   | `RUN composer install`                                      | 10     | Correctly set as per the requirement.                                 |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly set as per the requirement.                                 |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used a hardcoded version instead of using the build argument.         |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path (`/composer/vendor`). Should be `${APP_DIR}/vendor`. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly set as per the requirement.                                 |

Total Score: 66/100 points

Notes:
- Deduction of 2 points each for misplaced commands in criteria 2 and 8 due to hardcoded versions instead of using build arguments.
- Additional deduction of 2 points for incorrect command syntax in criterion 4 (`WORK DIR $AP_DIR`).
- Additional deduction of 10 points for incorrect source path in criterion 9.