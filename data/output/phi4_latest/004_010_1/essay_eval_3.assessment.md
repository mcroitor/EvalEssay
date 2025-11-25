# Assessment No: 3

## Date: 2025-11-25 13:52:57

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined as per the requirement                              |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing command                                                      |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing command                                                      |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing command                                                      |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrect path; only partial path provided                           |
| 6   | `RUN composer install`                                      | 0      | Missing command                                                      |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing command                                                      |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing command                                                      |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing command                                                      |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Incorrect path; only partial path provided                           |

Total Score: 10/100 points

Notes:
- The student response is incomplete, missing several required commands.
- The order of the commands is incorrect as they are not present in the Dockerfile.
- There are multiple errors and omissions that prevent meeting any criteria beyond the first.