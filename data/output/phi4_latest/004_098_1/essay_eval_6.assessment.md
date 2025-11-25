# Assessment No: 6

## Date: 2025-11-25 13:55:24

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined as per the task.                                    |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined and named as builder.                               |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set to `/composer`.                                         |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}`, which is a typo error.       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly copies the file to the specified directory.                 |
| 6   | `RUN composer install`                                      | 10     | Correctly installs dependencies using composer.                       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined as per the task.                                    |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly defines the base image with the specified tag.              |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Uses `/composer/vendor` instead of `${APP_DIR}/vendor`, which is a typo error. Deduction for misplaced command order (2 points). |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copies files to the working directory.                      |

Total Score: 84/100 points

Notes:
- There are two minor syntax errors with variable usage (`$APP_DIR` instead of `${APP_DIR}` and `/composer/vendor` instead of `${APP_DIR}/vendor`).
- A deduction of 2 points was applied for the misplaced command order in criterion 9.