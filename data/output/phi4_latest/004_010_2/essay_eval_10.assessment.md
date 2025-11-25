# Assessment No: 10

## Date: 2025-11-25 13:57:45

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Missing in the student response.                                      |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing in the student response.                                      |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing in the student response.                                      |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing in the student response.                                      |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Missing in the student response.                                      |
| 6   | `RUN composer install`                                      | 10     | Present, but misplaced as it should be after setting up the builder stage. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing in the student response.                                      |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing in the student response.                                      |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing in the student response.                                      |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing in the student response.                                      |

Total Score: 10/100 points

**Notes:**  
- The only correct command present is `RUN composer install`, but it's misplaced and lacks context, resulting in a deduction for incorrect order.
- All other required commands are missing from the student response.