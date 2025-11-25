# Assessment No: 9

## Date: 2025-11-25 13:57:22

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with no errors.                                     |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct syntax and usage of build argument.                           |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Environment variable set correctly.                                   |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, minor typo error.            |
| 5   | `COPY ./site/composer.json ${APP_DIR}/`                      | 10     | Correct path and syntax, no errors.                                   |
| 6   | `RUN composer install`                                      | 10     | Command is correct as per the requirement.                            |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Defined correctly with no errors.                                     |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct syntax and usage of build argument.                           |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path; should be `/composer/vendor`.                  |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct syntax and usage, no errors.                                  |

Total Score: 78/100 points

Notes:
- Criterion 4 has a minor typo with `$APP_DIR` instead of `${APP_DIR}`, resulting in an 8-point score.
- Criterion 9 is incorrect due to the wrong source path for copying from the builder image, leading to a 0-point score.