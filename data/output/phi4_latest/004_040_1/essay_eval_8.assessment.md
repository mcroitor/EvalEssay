# Assessment No: 8

## Date: 2025-11-25 13:56:27

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with no errors.                                     |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used a hardcoded version instead of the variable `${COMPOSER_VERSION}`.|
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing from the Dockerfile.                                          |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing from the Dockerfile.                                          |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used a hardcoded path `/composer` instead of `${APP_DIR}`.            |
| 6   | `RUN composer install`                                      | 10     | Correctly defined with no errors.                                     |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined with no errors.                                     |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly defined with no errors.                                     |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Used a hardcoded path `/composer/vendor` instead of `${APP_DIR}/vendor`.|
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly defined with no errors.                                     |

Total Score: 74/100 points

Notes:
- Deduction for incorrect order is not applied as the commands are in a logical sequence.
- Points deducted for criteria 2, 3, 4, 5, and 9 due to hardcoded paths or missing definitions.