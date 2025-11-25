# Assessment No: 9

## Date: 2025-11-25 13:57:29

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set as required.                                            |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used `$COMPOSER_VERSION` instead of `${COMPOSER_VERSION}`.            |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set as required.                                            |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}`.                              |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly copied with the right path and variable usage.              |
| 6   | `RUN composer install`                                      | 10     | Correct command as required.                                          |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly set as required.                                            |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used `$PHP_VERSION` instead of `${PHP_VERSION}`.                      |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Incorrect path `/composer/vendor`, should be `$APP_DIR/vendor`. Also, typo in destination directory name (`vendr`). |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copied as required.                                         |

Total Score: 80/100 points

Notes:
- Deductions were made for incorrect variable usage and a typo in the path.
- The order of commands is correct, so no additional deductions are applied.