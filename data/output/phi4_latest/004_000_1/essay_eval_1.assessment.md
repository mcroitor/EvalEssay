# Assessment No: 1

## Date: 2025-11-25 13:51:32

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | The student did not set the build argument correctly; they used `ARG COMPOSER` instead of `ARG COMPOSER_VERSION=2.7`. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | This line is missing entirely in the response. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | The environment variable setting is not present in the student's response. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | The working directory command is absent from the response. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | This copy instruction is missing from the student's response. |
| 6   | `RUN composer install`                                      | 0      | The command to run composer install is not included in the response. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | The build argument for PHP version is missing from the student's response. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | This line defining the base image for PHP is absent in the response. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | The instruction to copy dependencies from the builder image is missing. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | This final copy command is not present in the student's response. |

Total Score: 0/100 points

Notes:
- The student's response does not meet any of the specified criteria.
- There are multiple errors and omissions throughout the response, with no correct commands provided.