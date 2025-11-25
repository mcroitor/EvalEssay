# Assessment No: 1

## Date: 2025-11-25 13:52:07

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set as per the requirement.                                 |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined with the build argument and named as builder.       |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set to `/composer`.                                         |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correctly set to `${APP_DIR}`.                                        |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Minor typo: Extra slash in the destination path (`${APP_DIR}/`).      |
| 6   | `RUN composer install`                                      | 10     | Correctly installs dependencies using composer.                       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly set as per the requirement.                                 |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly defined with the build argument `${PHP_VERSION}`.           |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Incorrect source path: should be `${APP_DIR}/vendor`.                 |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copies files from the site directory to the working directory. |

Total Score: 84/100 points

Notes:
- Criterion 5 has a minor typo with an extra slash in the destination path.
- Criterion 9 has an incorrect source path, missing the build argument `${APP_DIR}`. Deduction of 4 points for this error.
- Commands are in the correct order; no additional deductions applied.