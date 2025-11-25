# Assessment No: 5

## Date: 2025-11-25 13:54:16

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | The student did not define the build argument correctly. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | The base image for Composer is missing and incorrectly referenced. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | The environment variable is not set. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | The working directory is not set, as the previous step was missed. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | The file copy command is missing entirely. |
| 6   | `RUN composer install`                                      | 0      | Composer installation command is missing. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | The build argument for PHP version is not defined. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | The base image for PHP is missing. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | The copy command from builder is missing, as the previous steps were not completed. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | The file copy to the final image is missing. |

Total Score: 0/100 points