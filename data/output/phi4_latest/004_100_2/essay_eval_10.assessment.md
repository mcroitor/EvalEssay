# Assessment No: 10

## Date: 2025-11-25 13:58:14

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set as per the requirement.                                 |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined with the build argument and named as builder.       |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Environment variable set correctly.                                   |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Working directory set using the environment variable correctly.      |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Correct command but includes an unnecessary slash in `${APP_DIR}/`.  |
| 6   | `RUN composer install`                                      | 10     | Correctly installs dependencies using composer.                       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Build argument set correctly for the PHP version.                     |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Base image defined correctly with the build argument.                 |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path; should be `${APP_DIR}/vendor`.                |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copies files from the site directory to the working directory. |

Total Score: 78/100 points

**Notes:**  
- Criterion 5 has one typo error, resulting in a deduction of 2 points.
- Criterion 9 is not met due to an incorrect source path for copying dependencies, leading to a score of 0 points.