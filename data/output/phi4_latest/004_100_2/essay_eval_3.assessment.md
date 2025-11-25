# Assessment No: 3

## Date: 2025-11-25 13:53:28

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with the specified version.                         |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly uses the build argument and names the stage as builder.      |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly sets the environment variable to `/composer`.               |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correctly sets the working directory using the environment variable.  |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Correct command but includes an unnecessary trailing slash in path.   |
| 6   | `RUN composer install`                                      | 10     | Correctly installs dependencies with composer.                        |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined with the specified version.                         |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly uses the build argument for the base image.                 |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Incorrect source path; should be `${APP_DIR}/vendor`. Deduction for misplaced command order. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copies files from the site directory to the working directory. |

Total Score: 84/100 points

Notes:
- Criterion 5 has a minor typo with an unnecessary trailing slash.
- Criterion 9 has an incorrect source path and is misplaced in order, leading to deductions.