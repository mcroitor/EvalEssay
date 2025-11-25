# Assessment No: 9

## Date: 2025-11-25 13:57:26

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined as per the requirement                              |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined and named as builder                                |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set to `/composer`                                          |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, minor typo                   |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, minor typo                   |
| 6   | `RUN composer install`                                      | 10     | Correctly defined                                                    |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly set to `8.1`                                                |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly defined as per the requirement                              |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Incorrect source path `/composer/vendor`, should be `${APP_DIR}/vendor`. Misplaced command (should follow ARG PHP_VERSION) -2 points for order, -2 points for incorrect path |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly defined                                                    |

Total Score: 82/100 points

Notes:
- The commands are mostly in the correct order except for the misplaced `COPY --from=builder` command, which resulted in a deduction of 2 points.
- Minor typos with `$APP_DIR` instead of `${APP_DIR}` were noted but did not significantly impact functionality.