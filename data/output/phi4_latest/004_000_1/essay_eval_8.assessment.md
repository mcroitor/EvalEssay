# Assessment No: 8

## Date: 2025-11-25 13:56:17

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Missing the build argument definition with correct version. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Base image and tag are not defined correctly; missing `AS builder`. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Environment variable is not set. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Working directory is not set. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Copy command for composer.json is missing. |
| 6   | `RUN composer install`                                      | 0      | Composer install command is missing. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Build argument for PHP version is not defined. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Base image for PHP is not defined correctly. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Copy command from builder to final image is missing. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Final copy command for site files is missing. |

Total Score: 0/100 points

Notes:
- The student response does not contain any of the required Dockerfile instructions.
- All criteria are unmet due to absence of necessary commands and arguments.