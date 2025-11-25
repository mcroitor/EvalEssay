# Assessment No: 1

## Date: 2025-11-25 13:51:57

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set as per the requirement.                                 |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined with the specified tag and alias.                   |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Environment variable is correctly set.                                |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}`, which is a minor typo error. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 9      | Correctly copies the file, but uses `$APP_DIR` instead of `${APP_DIR}`.|
| 6   | `RUN composer install`                                      | 10     | Command is correctly written without errors.                          |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly set as per the requirement.                                 |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly defined with the specified tag.                             |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect path; should be `${APP_DIR}/vendor`. Misplaced command order.|
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copies the directory as required.                           |

Total Score: 77/100 points

Notes:
- Criterion 4 and 5 have minor typo errors with `$APP_DIR` instead of `${APP_DIR}`.
- Criterion 9 has a significant error in the path used for copying, and it is misplaced in the order of commands. Deduction applied for both issues.