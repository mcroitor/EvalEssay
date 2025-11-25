# Assessment No: 5

## Date: 2025-11-25 13:54:53

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly sets the build argument as specified.                       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly uses the base image with the tag and alias.                 |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly sets the environment variable as specified.                 |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correctly sets the working directory using the environment variable.  |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly copies the composer.json file to the specified directory.    |
| 6   | `RUN composer install`                                      | 10     | Correctly installs dependencies as required.                          |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly sets the build argument for PHP version.                    |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly uses the base image with the specified tag.                 |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correctly copies installed dependencies from the builder stage.       |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copies files from the site directory to the working directory. |

Total Score: 100/100 points

The student response meets all criteria without any errors, and the commands are in the correct order.