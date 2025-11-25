# Assessment No: 7

## Date: 2025-11-25 13:55:36

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | The student did not specify the build argument correctly. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | The base image and tag are missing, and the alias is absent. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | This environment variable was not set in the student response. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | The working directory command is missing. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | The copy command for `composer.json` was not included. |
| 6   | `RUN composer install`                                      | 0      | The command to run composer install is absent. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | This build argument was not specified by the student. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | The second base image definition is missing. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | This copy command from builder to the final image was not included. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | The student did not include this copy command. |

Total Score: 0/100 points

Notes:
- The student response is incomplete and does not address any of the specified criteria.
- There are no commands provided, so there's no issue with order or placement.