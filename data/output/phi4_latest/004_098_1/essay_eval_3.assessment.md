# Assessment No: 3

## Date: 2025-11-25 13:53:21

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined as per the requirement.                             |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined with the build argument and named as builder.       |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set to `/composer`.                                         |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}`, but it works in Dockerfiles. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly copies the file to the specified directory.                 |
| 6   | `RUN composer install`                                      | 10     | Correctly installs dependencies using Composer.                       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined as per the requirement.                             |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly uses the build argument for the base image.                 |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Incorrect source path; should be `${APP_DIR}/vendor`. Deduction for error and order issue (2 points). |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copies the site directory to the working directory.         |

Total Score: 84/100 points

Notes:
- Criterion 4 has a minor typo with `$APP_DIR` instead of `${APP_DIR}`, but it is acceptable in Dockerfiles.
- Criterion 9 has an incorrect path and order issue, leading to a deduction of 2 points for each error (total 4 points deducted).