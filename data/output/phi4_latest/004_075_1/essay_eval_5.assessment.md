# Assessment No: 5

## Date: 2025-11-25 13:54:36

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with the specified version.                         |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used a hardcoded version instead of the build argument `${COMPOSER_VERSION}`. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set to `/composer`.                                         |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Typo in command (`WORK DIR $AP_DIR`). Incorrect variable and syntax.  |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR` instead of `${APP_DIR}`.                              |
| 6   | `RUN composer install`                                      | 10     | Correctly executed the command without errors.                        |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined with the specified version.                         |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used a hardcoded version instead of `${PHP_VERSION}`.                 |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path; should be `/${APP_DIR}/vendor`.                |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copied files to the specified directory.                    |

Total Score: 64/100 points

Notes:
- Deduction for command order is not applicable as all commands are in the correct sequence.
- Points were deducted for incorrect usage of variables and hardcoded values where build arguments should have been used.