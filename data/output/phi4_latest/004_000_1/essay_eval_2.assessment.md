# Assessment No: 2

## Date: 2025-11-25 13:52:13

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | The student did not define the build argument correctly.              |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | This line is missing entirely.                                        |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | This environment variable definition is absent.                       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | The working directory command is not present.                         |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | The copy command for the composer.json file is missing.               |
| 6   | `RUN composer install`                                      | 0      | The command to run composer install is absent.                        |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | This build argument is not defined in the response.                   |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | The second FROM statement is missing entirely.                        |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | This command to copy dependencies from the builder image is absent.   |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | The final COPY command for site files is missing.                     |

Total Score: 0/100 points

Notes:
- The student response does not contain any of the required Dockerfile instructions.
- There are multiple errors and omissions, with no criteria met at all.