# Assessment No: 2

## Date: 2025-11-25 13:52:34

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined as per the requirement.                             |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used a hardcoded version instead of using the build argument.         |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set the environment variable as required.                   |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Incorrect syntax used (`WORK DIR $AP_DIR`).                          |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$AP_DIR` instead of `${APP_DIR}`.                              |
| 6   | `RUN composer install`                                      | 10     | Correctly installed dependencies using composer.                     |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined as per the requirement.                             |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used a hardcoded version instead of using the build argument.         |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correctly copied dependencies from builder to final image.           |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copied files from the site directory to the working directory. |

Total Score: 74/100 points

Notes:
- Deduction of 2 points each for criteria 2 and 8 due to not using build arguments.
- Deduction of 10 points for criterion 4 due to incorrect syntax and variable name error.
- Deduction of 2 points for criterion 5 due to a typo in the environment variable.