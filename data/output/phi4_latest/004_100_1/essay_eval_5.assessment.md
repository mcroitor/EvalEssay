# Assessment No: 5

## Date: 2025-11-25 13:54:47

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set the build argument.                                     |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used `$COMPOSER_VERSION` instead of `${COMPOSER_VERSION}` (1 typo).    |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set the environment variable.                               |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}` (1 typo).                     |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly copied the file to the specified directory.                 |
| 6   | `RUN composer install`                                      | 10     | Correctly installed dependencies using Composer.                      |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly set the build argument for PHP version.                     |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used `$PHP_VERSION` instead of `${PHP_VERSION}` (1 typo).             |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Incorrect path `/composer/vendor` should be `/app_dir/vendor`. Typo in destination as `/vendr` (2 typos, 2 points deduction for order issue). |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copied files to the working directory.                      |

Total Score: 80/100 points

Notes:
- Deduction of 2 points in criterion 9 due to incorrect path and typo.
- Additional deduction of 2 points for misplaced command order (COPY --from=builder should be after `FROM php:${PHP_VERSION}-fpm`).