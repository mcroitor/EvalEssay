# Assessment No: 6

## Date: 2025-11-25 13:55:13

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Correct, but misplaced in order.                                      |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Incorrect syntax and missing `AS builder`.                            |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set environment variable.                                   |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Correct, but uses `$APP_DIR` instead of `${APP_DIR}`.                 |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrect syntax with `--builder`.                                    |
| 6   | `RUN composer install`                                      | 10     | Correctly installs dependencies.                                      |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Correct, but misplaced in order.                                      |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Incorrect syntax and missing `${PHP_VERSION}` interpolation.          |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder`.                                             |
| 10  | `COPY ./site/ /var/www/html/`                               | 8      | Correct, but uses `.`, which is a typo for `./site/`.                 |

Total Score: 52/100 points

Notes:
- Misplaced commands (1 and 7) result in a deduction of 4 points.
- Several syntax errors and typos lead to deductions as per the rubric.