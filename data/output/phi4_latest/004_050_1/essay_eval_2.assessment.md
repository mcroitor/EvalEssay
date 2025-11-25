# Assessment No: 2

## Date: 2025-11-25 13:52:27

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with no errors.                                     |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined with no errors.                                     |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly defined with no errors.                                     |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, but it's a minor typo.       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly defined with no errors.                                     |
| 6   | `RUN composer install`                                      | 0      | Missing command; not included in the response.                        |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing command; not included in the response.                        |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing command; not included in the response.                        |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing command; not included in the response.                        |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing command; not included in the response.                        |

Total Score: 38/100 points

Notes:
- Commands for criteria 6, 7, 8, 9, and 10 are missing.
- A deduction of 2 points each for misplaced commands is not applicable as they were omitted rather than misplaced.
- The total score reflects the absence of several key components required to complete the task.