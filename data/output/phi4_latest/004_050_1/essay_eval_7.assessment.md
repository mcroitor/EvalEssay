# Assessment No: 7

## Date: 2025-11-25 13:55:50

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Typo: Used `$APP_DIR` instead of `${APP_DIR}`. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Typo: Used `$APP_DIR/` instead of `${APP_DIR}`. |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing in the response. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing in the response. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing in the response. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing in the response. |

Total Score: 46/100 points

**Notes:**  
- Deduction for misplaced commands is not applicable as missing commands cannot be reordered.
- The student missed several critical parts of the Dockerfile, including setting `ARG PHP_VERSION`, defining the second base image, and copying dependencies and site files to the final image.