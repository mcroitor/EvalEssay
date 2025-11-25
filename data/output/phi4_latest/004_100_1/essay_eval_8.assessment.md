# Assessment No: 8

## Date: 2025-11-25 13:56:49

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with no errors.                                     |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used `$COMPOSER_VERSION` instead of `${COMPOSER_VERSION}` (1 typo).   |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly defined with no errors.                                     |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}` (1 typo).                     |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly defined with no errors.                                     |
| 6   | `RUN composer install`                                      | 10     | Correctly defined with no errors.                                     |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined with no errors.                                     |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used `$PHP_VERSION` instead of `${PHP_VERSION}` (1 typo).             |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Incorrect path `/composer/vendor` should be `/app_dir/vendor`. Typo in destination (`/vendr`). Misplaced command order. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly defined with no errors.                                     |

Total Score: 80/100 points

Notes:
- Deduction of 2 points for the misplaced command in criterion 9.
- Typo deductions applied where applicable.