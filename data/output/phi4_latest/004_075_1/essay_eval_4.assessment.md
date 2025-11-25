# Assessment No: 4

## Date: 2025-11-25 13:53:56

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set the build argument.                                     |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used a hardcoded version instead of the variable, but correct syntax otherwise. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set the environment variable.                                |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Typo in command (`WORK DIR $AP_DIR`). Incorrect syntax and typo in variable name. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Correctly copied the file, but used `$APP_DIR` instead of `${APP_DIR}`.|
| 6   | `RUN composer install`                                      | 10     | Correctly installed dependencies using Composer.                       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly set the build argument for PHP version.                      |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used a hardcoded version instead of the variable, but correct syntax otherwise. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correctly copied dependencies from builder image.                      |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copied files to the working directory of the final image.    |

Total Score: 84/100 points

Notes:
- Deduction for incorrect command syntax in criterion 4.
- Minor deductions for using hardcoded values instead of variables in criteria 2 and 8.