# Assessment No: 5

## Date: 2025-11-25 13:54:19

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Criteria fully met without any errors.                                |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Criterion not met; the command is missing.                            |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Criterion not met; the command is missing.                            |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Criterion not met; the command is missing.                            |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Criterion not met; the command is incorrect (`./site` instead of `./site/composer.json`). |
| 6   | `RUN composer install`                                      | 0      | Criterion not met; the command is missing.                            |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Criterion not met; the command is missing.                            |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Criterion not met; the command is missing.                            |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Criterion not met; the command is missing.                            |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Criterion not met; the command is incorrect (`./site` instead of `./site/`). |

Total Score: 10/100 points

Notes:
- The student response only includes one line, which partially meets criterion 1.
- All other criteria are not addressed in the response.