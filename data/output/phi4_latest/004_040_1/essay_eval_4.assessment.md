# Assessment No: 4

## Date: 2025-11-25 13:53:45

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with the specified version.                         |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used a hardcoded value instead of `${COMPOSER_VERSION}`. Minor typo error. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing in the student response.                                      |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing in the student response.                                      |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used a hardcoded path instead of `${APP_DIR}`. Minor typo error.     |
| 6   | `RUN composer install`                                      | 10     | Correctly implemented without errors.                                 |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined with the specified version.                         |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used a hardcoded value instead of `${PHP_VERSION}`. Minor typo error.|
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correctly implemented without errors.                                 |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly implemented without errors.                                 |

Total Score: 74/100 points

Notes:
- Deduction of 2 points for each misplaced command was not applied as the order is correct.
- Missing criteria (3 and 4) resulted in a deduction of 20 points.
- Minor typo errors in criteria 2, 5, and 8 led to deductions totaling 6 points.