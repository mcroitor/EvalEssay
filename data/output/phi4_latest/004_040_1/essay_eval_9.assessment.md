# Assessment No: 9

## Date: 2025-11-25 13:57:08

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set as per the requirement.                                 |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Uses a hardcoded version instead of the variable, which is incorrect. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing in the Dockerfile.                                            |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing in the Dockerfile.                                            |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses a hardcoded path instead of the variable, which is incorrect.    |
| 6   | `RUN composer install`                                      | 10     | Correctly implemented.                                                |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly set as per the requirement.                                 |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Uses a hardcoded version instead of the variable, which is incorrect. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correctly implemented.                                                |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly implemented.                                                |

Total Score: 74/100 points

Notes:
- Deduction of 2 points each for criteria 2 and 8 due to the use of hardcoded values instead of variables.
- Criteria 3 and 4 are missing entirely, resulting in a deduction of 20 points.
- The order of commands is correct; no additional deductions for misplaced commands.