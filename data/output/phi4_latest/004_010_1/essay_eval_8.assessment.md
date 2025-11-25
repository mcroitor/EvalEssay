# Assessment No: 8

## Date: 2025-11-25 13:56:21

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set the build argument as required.                         |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing command in student response.                                  |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing command in student response.                                  |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing command in student response.                                  |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrectly copied the entire site directory instead of just composer.json. |
| 6   | `RUN composer install`                                      | 0      | Missing command in student response.                                  |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing command in student response.                                  |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing command in student response.                                  |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing command in student response.                                  |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Incorrectly copied the entire site directory without specifying source and destination correctly. |

Total Score: 10/100 points

Notes:
- The student only provided one line of code, which was partially correct for criterion 1.
- All other criteria were not met due to missing or incorrect commands.
- There are no misplaced commands as most required commands are absent.