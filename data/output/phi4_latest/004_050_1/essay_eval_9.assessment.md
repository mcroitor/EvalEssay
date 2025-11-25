# Assessment No: 9

## Date: 2025-11-25 13:57:11

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with the specified version.                         |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly uses the build argument and names the stage as builder.      |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly sets the environment variable to `/composer`.               |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}`, which is a minor typo.       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly copies the file to the specified directory.                 |
| 6   | `RUN composer install`                                      | 0      | Missing in the student response.                                      |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing in the student response.                                      |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing in the student response.                                      |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing in the student response.                                      |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing in the student response.                                      |

Total Score: 38/100 points

Notes:
- Criteria 6, 7, 8, 9, and 10 are missing from the student's response.
- Criterion 4 has a minor typo with `$APP_DIR` instead of `${APP_DIR}`.