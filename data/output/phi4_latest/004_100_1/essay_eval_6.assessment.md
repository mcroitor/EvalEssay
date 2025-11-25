# Assessment No: 6

## Date: 2025-11-25 13:55:27

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with the specified version.                         |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used `$COMPOSER_VERSION` instead of `${COMPOSER_VERSION}`.            |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set the environment variable.                               |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}`.                              |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly copied the file to the specified directory.                 |
| 6   | `RUN composer install`                                      | 10     | Correctly installed dependencies using Composer.                     |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined with the specified version.                         |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used `$PHP_VERSION` instead of `${PHP_VERSION}`.                     |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Incorrect path `/composer/vendor`; should be `/app_dir/vendor`.       |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copied the site directory to the working directory.         |

Total Score: 80/100 points

Notes:
- Deduction of 2 points each for misplaced commands in criteria 2, 4, and 8 due to incorrect variable syntax.
- Additional deduction of 4 points for criterion 9 due to incorrect path specification.