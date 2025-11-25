# Assessment No: 8

## Date: 2025-11-25 13:56:41

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set the build argument as required.                         |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined and named the base image as builder.                |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set the environment variable to `/composer`.               |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, but it works in Docker.     |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly copied the `composer.json` file to the specified directory.|
| 6   | `RUN composer install`                                      | 10     | Correctly installed dependencies using Composer.                     |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly set the build argument for PHP version.                    |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly defined the base image for PHP with the specified tag.     |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path; should be `${APP_DIR}/vendor`.                |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copied files from the site directory to the working directory. |

Total Score: 78/100 points

Notes:
- Criterion 4 has a minor typo with `$APP_DIR`, but it is acceptable in Docker.
- Criterion 9 has an incorrect source path, leading to a deduction of 10 points.
- No command order issues detected.