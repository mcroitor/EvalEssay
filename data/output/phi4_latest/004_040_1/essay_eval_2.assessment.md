# Assessment No: 2

## Date: 2025-11-25 13:52:23

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined as per the requirement.                             |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used a hardcoded version instead of using the build argument.         |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing in the student response.                                      |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing in the student response.                                      |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Hardcoded path instead of using `${APP_DIR}`.                         |
| 6   | `RUN composer install`                                      | 10     | Correctly implemented as per the requirement.                         |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined as per the requirement.                             |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used a hardcoded version instead of using `${PHP_VERSION}`.           |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correctly implemented as per the requirement.                         |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly implemented as per the requirement.                         |

Total Score: 74/100 points

Notes:
- Deductions for criteria 2 and 8 due to hardcoded values instead of using build arguments.
- Criteria 3 and 4 are missing entirely, resulting in zero points for each.
- No command order issues detected.