# Assessment No: 1

## Date: 2025-11-25 13:51:50

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | The argument is defined after the FROM statement, which is incorrect.|
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | The FROM statement is missing the ARG and does not use the correct syntax for the build argument. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly defined.                                                    |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}`, which is a typo error.       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrect syntax used: `COPY --builder`.                             |
| 6   | `RUN composer install`                                      | 10     | Correctly defined.                                                    |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | The argument is defined after the FROM statement, which is incorrect.|
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | The FROM statement is missing the ARG and does not use the correct syntax for the build argument. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path; should be `/composer/vendor`.                  |
| 10  | `COPY ./site/ /var/www/html/`                               | 8      | Uses `. /var/www/html/` instead of `./site/ /var/www/html/`, which is a typo error. |

Total Score: 52/100 points

Notes:
- The order of commands is incorrect, leading to deductions.
- Several syntax errors and typos are present in the Dockerfile.