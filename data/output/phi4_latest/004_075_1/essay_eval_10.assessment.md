# Assessment No: 10

## Date: 2025-11-25 13:57:59

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set the build argument.                                     |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used a hardcoded version instead of using the variable `${COMPOSER_VERSION}`. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set the environment variable.                                |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Typo in command (`WORK DIR $AP_DIR`). Incorrect syntax and variable name. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR` instead of `${APP_DIR}`.                               |
| 6   | `RUN composer install`                                      | 10     | Correctly installed dependencies using composer.                       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly set the build argument.                                     |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly used the variable `${PHP_VERSION}` for the base image.       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path; should be `/composer/vendor`.                   |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copied files to the working directory.                       |

Total Score: 66/100 points

Notes:
- Deduction for command order is not applicable as all commands are in the correct sequence.
- Points were deducted for incorrect usage of variables and typos in commands.