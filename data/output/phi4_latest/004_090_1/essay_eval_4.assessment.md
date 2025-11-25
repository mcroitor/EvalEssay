# Assessment No: 4

## Date: 2025-11-25 13:53:59

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set as per the requirement.                                 |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined with the build argument and named as builder.       |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set to `/composer`.                                         |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, which is a minor typo error. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly copied from `./site` to `${APP_DIR}`.                       |
| 6   | `RUN composer install`                                      | 10     | Correctly installed dependencies using composer.                     |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly set as per the requirement.                                 |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly defined with the build argument `${PHP_VERSION}`.           |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect path; should be `/composer/vendor`. Deduction for error.    |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copied files from `./site` to the working directory.        |

Total Score: 78/100 points

Notes:
- A deduction of 2 points was applied for the incorrect path in criterion 9.
- An additional 2-point deduction was applied due to the misplaced command order (COPY vendor directory should come after defining the final image base).