# Assessment No: 4

## Date: 2025-11-25 13:53:48

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with no errors.                                     |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined with no errors.                                     |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly defined with no errors.                                     |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, which is acceptable in Dockerfiles but not exactly as specified. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly defined with no errors.                                     |
| 6   | `RUN composer install`                                      | 0      | Missing command, does not meet the criteria.                          |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing command, does not meet the criteria.                          |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing command, does not meet the criteria.                          |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing command, does not meet the criteria.                          |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing command, does not meet the criteria.                          |

Total Score: 38/100 points

Notes:
- The student response is incomplete and misses several critical steps (criteria 6 to 10).
- There is a minor issue with using `$APP_DIR` instead of `${APP_DIR}` in criterion 4, but it's acceptable in Dockerfiles.
- No commands are out of order since the missing ones were not included.