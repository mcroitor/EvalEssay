# Assessment No: 9

## Date: 2025-11-25 13:57:04

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Missing in the response.                                             |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing in the response.                                             |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing in the response.                                             |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing in the response.                                             |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Missing in the response.                                             |
| 6   | `RUN composer install`                                      | 10     | Present but misplaced, no typo errors.                                |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing in the response.                                             |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing in the response.                                             |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing in the response.                                             |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing in the response.                                             |

Total Score: 10/100 points

Notes:
- The command `RUN composer install` is present but misplaced, leading to a deduction of 2 points for incorrect order.
- All other criteria are missing from the student's response.