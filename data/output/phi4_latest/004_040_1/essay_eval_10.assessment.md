# Assessment No: 10

## Date: 2025-11-25 13:57:48

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined as per the requirement                              |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used a hardcoded version instead of using the build argument          |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing in the Dockerfile                                             |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing in the Dockerfile; depends on ENV APP_DIR                     |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used a hardcoded path instead of using the environment variable       |
| 6   | `RUN composer install`                                      | 10     | Correctly implemented                                                  |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined as per the requirement                              |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used a hardcoded version instead of using the build argument          |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correctly implemented                                                  |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly implemented                                                  |

Total Score: 74/100 points

Notes:
- Criterion 2 and 8 have a deduction of 2 points each for not using the build argument.
- Criteria 3, 4, and 5 are missing entirely. Each is worth 10 points, resulting in a total deduction of 30 points.
- The commands are mostly in the correct order, so no additional deductions for misplaced commands were applied.