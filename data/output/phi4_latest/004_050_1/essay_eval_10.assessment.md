# Assessment No: 10

## Date: 2025-11-25 13:57:51

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with no errors                                      |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined with no errors                                      |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly defined with no errors                                      |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, typo error                   |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR/` instead of `${APP_DIR}`, typo error                  |
| 6   | `RUN composer install`                                      | 0      | Missing command                                                      |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing command                                                      |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing command                                                      |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing command                                                      |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing command                                                      |

Total Score: 46/100 points

Notes:
- The student response is missing several critical commands (6, 7, 8, 9, and 10), which are essential for completing the Dockerfile as per the task description.
- There were minor syntax errors in lines 4 and 5 due to incorrect variable usage.