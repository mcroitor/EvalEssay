# Assessment No: 3

## Date: 2025-11-25 13:53:17

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined as per the requirement                              |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined with the build argument                             |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set to `/composer`                                          |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, which is a typo              |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly copied with the right path                                  |
| 6   | `RUN composer install`                                      | 10     | Correctly installed dependencies                                     |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined as per the requirement                              |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly defined with the build argument                             |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect path; should be `${APP_DIR}/vendor`, not `/composer/vendor` |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copied files to the working directory                       |

Total Score: 78/100 points

Notes:
- Criterion 4 has a minor typo with `$APP_DIR` instead of `${APP_DIR}`.
- Criterion 9 is incorrect due to an error in specifying the source path for copying dependencies. The correct path should be `${APP_DIR}/vendor`. This results in a deduction of 10 points and does not meet the criteria fully.