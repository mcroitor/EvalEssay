# Assessment No: 2

## Date: 2025-11-25 13:52:45

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly set as specified.                                          |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used `$COMPOSER_VERSION` instead of `${COMPOSER_VERSION}` (1 typo).   |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set as specified.                                          |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}` (1 typo).                    |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly set as specified.                                          |
| 6   | `RUN composer install`                                      | 10     | Correctly implemented.                                               |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly set as specified.                                          |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used `$PHP_VERSION` instead of `${PHP_VERSION}` (1 typo).            |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Incorrect path `/composer/vendor` and `/var/www/html/vendr`. Two typos.|
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly set as specified.                                          |
|     | **Total**                                                   | **80** | Misplaced commands: None.                                            |

Total Score: 80/100 points