# Assessment No: 7

## Date: 2025-11-25 13:55:46

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set as per the requirement.                                 |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used a hardcoded version instead of `${COMPOSER_VERSION}`.            |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing from the Dockerfile.                                          |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing from the Dockerfile.                                          |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `/composer` instead of `${APP_DIR}`.                             |
| 6   | `RUN composer install`                                      | 10     | Correctly implemented.                                                |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly set as per the requirement.                                 |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly used `${PHP_VERSION}`.                                      |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Used `/composer/vendor` instead of `${APP_DIR}/vendor`.               |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly implemented.                                                |

Total Score: 74/100 points

Notes:
- Deduction for incorrect order is not applied as all commands are in the correct sequence.
- Missing `ENV APP_DIR=/composer` and `WORKDIR ${APP_DIR}` resulted in a deduction of 20 points.
- Typo errors in criteria 2, 5, and 9 led to a total deduction of 6 points.