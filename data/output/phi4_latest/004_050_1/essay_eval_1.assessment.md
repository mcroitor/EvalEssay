# Assessment No: 1

## Date: 2025-11-25 13:51:46

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with the specified version.                         |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly uses the build argument and labels as builder.              |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly sets the environment variable to `/composer`.               |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}`, which is a typo.            |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly copies the file to the specified directory.                |
| 6   | `RUN composer install`                                      | 0      | Missing from the student response.                                    |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing from the student response.                                    |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing from the student response.                                    |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing from the student response.                                    |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing from the student response.                                    |

Total Score: 38/100 points

Notes:
- The Dockerfile is incomplete, missing several critical steps (criteria 6 to 10).
- There is a minor typo in criterion 4 with `$APP_DIR` instead of `${APP_DIR}`.
- Misplaced commands deduction does not apply as the student response lacks most of the required commands.