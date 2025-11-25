# Assessment No: 8

## Date: 2025-11-25 13:56:38

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with the specified version.                         |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used a hardcoded version instead of `${COMPOSER_VERSION}`.            |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set the environment variable.                               |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Typo in command (`WORK DIR $AP_DIR`). Incorrect syntax and typo in variable name. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Correct path, but used `$APP_DIR` instead of `${APP_DIR}`.            |
| 6   | `RUN composer install`                                      | 10     | Command is correct and in the right place.                            |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined with the specified version.                         |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly used the build argument for the base image.                 |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path; should be `${APP_DIR}/vendor`.                |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copied files to the working directory.                     |

Total Score: 66/100 points

Notes:
- Deduction of 2 points for incorrect order in criterion 4 due to syntax error.
- Criterion 9 has a significant error with the source path, resulting in 0 points.
- Criterion 2 had one typo error (hardcoded version instead of using build argument), resulting in an 8-point score.