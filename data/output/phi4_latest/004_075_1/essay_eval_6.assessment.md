# Assessment No: 6

## Date: 2025-11-25 13:55:16

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set as per the requirement.                                 |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used a hard-coded version instead of using the build argument.        |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set as per the requirement.                                 |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Incorrect syntax used (`WORK DIR $AP_DIR`).                          |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$AP_DIR` instead of `${APP_DIR}`, which is a typo.             |
| 6   | `RUN composer install`                                      | 10     | Correctly implemented as per the requirement.                        |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly set as per the requirement.                                 |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used a hard-coded version instead of using the build argument.        |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path; should be `/composer/vendor`.                 |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly implemented as per the requirement.                        |

Total Score: 64/100 points

Notes:
- Deduction for incorrect command order is not applicable as all commands are in the correct sequence.
- Points were deducted for hard-coded values and typos where specified.