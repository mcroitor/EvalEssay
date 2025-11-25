# Assessment No: 4

## Date: 2025-11-25 13:54:10

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined as per the requirement.                             |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct usage of build argument in base image definition.             |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Environment variable set correctly.                                   |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Working directory is set using the environment variable correctly.    |
| 5   | `COPY ./site/composer.json ${APP_DIR}/`                      | 8      | Correct command but includes an unnecessary trailing slash in path.   |
| 6   | `RUN composer install`                                      | 10     | Command executed as required.                                         |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Build argument defined correctly for the second stage.                |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct usage of build argument in base image definition.             |
| 9   | `COPY --from=builder ${APP_DIR}/vendor /var/www/html/vendor` | 5      | Incorrect source path; should be `/composer/vendor`.                  |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copies the site directory to the working directory.         |

Total Score: 83/100 points

Notes:
- Criterion 5 has a minor typo with an unnecessary trailing slash, resulting in a deduction of 2 points.
- Criterion 9 has a significant error in the source path for copying dependencies, leading to a deduction of 5 points.