# Assessment No: 7

## Date: 2025-11-25 13:56:05

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined as per the requirement                              |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined and named as builder                                |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set to `/composer`                                          |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, minor typo                   |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, minor typo                   |
| 6   | `RUN composer install`                                      | 10     | Correctly implemented                                                 |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined as per the requirement                              |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly defined with the appropriate tag                            |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Incorrect source path `/composer/vendor`, should be `${APP_DIR}/vendor`. Also, misplaced command order (deduction of 2 points) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly implemented                                                 |

Total Score: 82/100 points

Notes:
- Minor typos in the use of `$APP_DIR` instead of `${APP_DIR}` for criteria 4 and 5.
- Misplaced command order for criterion 9 resulted in a deduction of 2 points. The `ENV APP_DIR=/composer` line should be removed from the final image section to maintain logical flow, but it does not affect the score as it is not part of the scoring criteria.