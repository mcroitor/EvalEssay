# Assessment No: 9

## Date: 2025-11-25 13:57:18

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set as per the requirement.                                 |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used a hardcoded version instead of using the build argument.         |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set as per the requirement.                                 |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Typo in command (`WORK DIR $AP_DIR`). Incorrect variable usage.       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly copied as per the requirement.                              |
| 6   | `RUN composer install`                                      | 10     | Correctly executed as per the requirement.                            |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly set as per the requirement.                                 |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used a hardcoded version instead of using the build argument.         |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path; should be `/composer/vendor`.                  |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copied as per the requirement.                              |

Total Score: 66/100 points

Notes:
- Deduction of 2 points for each misplaced command is not applicable here as all commands are in the correct order.
- Misplaced and incorrect variable usage led to deductions in criteria 4 and 9.
- Hardcoding values instead of using build arguments resulted in deductions for criteria 2 and 8.