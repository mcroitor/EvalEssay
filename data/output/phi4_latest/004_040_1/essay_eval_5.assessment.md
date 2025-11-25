# Assessment No: 5

## Date: 2025-11-25 13:54:25

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used literal version instead of variable; minor error. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing command in the Dockerfile. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing command in the Dockerfile. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used literal path instead of variable; minor error. |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used literal version instead of variable; minor error. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Incorrect source path due to missing APP_DIR setup. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

Total Score: 70/100 points

**Notes on Order and Additional Deductions:**
- The order of commands is generally correct, but the absence of `ENV APP_DIR=/composer` and `WORKDIR ${APP_DIR}` affects the correctness of subsequent steps. No additional point deductions for misplaced commands are necessary beyond those already noted.