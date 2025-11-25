# Assessment No: 1

## Date: 2025-11-25 13:51:36

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with no errors.                                     |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing; the student did not include this line.                       |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing; the student did not define this environment variable.        |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing; the working directory is not set.                            |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrectly copied; only `./site` was specified, missing target path. |
| 6   | `RUN composer install`                                      | 0      | Missing; the command to install dependencies is not included.         |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing; the build argument for PHP version is not defined.           |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing; the second base image is not specified.                      |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing; this step to copy dependencies from builder is absent.       |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Incorrectly copied; only `./site` was specified, missing target path. |

Total Score: 10/100 points

Notes:
- The student's response contains only one line (`ARG COMPOSER_VERSION=2.7`) which is correct.
- All other required steps are either incorrect or missing entirely.
- Misplaced commands do not apply as most of the necessary commands are absent.