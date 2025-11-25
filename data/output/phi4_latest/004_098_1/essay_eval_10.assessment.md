# Assessment No: 10

## Date: 2025-11-25 13:58:07

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with no errors.                                     |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined and named as builder, placed in correct order.      |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Defined correctly but should be before WORKDIR for clarity.           |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Correct command with typo error (`$APP_DIR` instead of `${APP_DIR}`). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly defined and placed in correct order.                        |
| 6   | `RUN composer install`                                      | 10     | Correct command and placed correctly after dependencies are copied.   |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined with no errors.                                     |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly defined and placed in correct order.                        |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Incorrect path; should be `${APP_DIR}/vendor`. Deduction for error.   |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly defined and placed in correct order.                        |

Total Score: 82/100 points

Notes:
- Criterion 3 and 4 have a minor deduction due to the placement of `ENV APP_DIR=/composer` after `FROM composer:${COMPOSER_VERSION} AS builder`. It should be before `WORKDIR ${APP_DIR}` for clarity.
- Criterion 9 has a deduction due to an incorrect path in the `COPY --from=builder` command. The correct path should use `${APP_DIR}/vendor`.
- No commands are misplaced, so no additional deductions for order.