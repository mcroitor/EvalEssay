# Assessment No: 1

## Date: 2025-11-25 13:51:42

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Used literal version instead of variable; minor typo error. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing command in the Dockerfile. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing command in the Dockerfile. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used literal path instead of variable; minor typo error. |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Used literal version instead of variable; minor typo error. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Incorrect source path due to missing APP_DIR setup. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

Total Score: 70/100 points

Notes:
- Criterion 2, 5, and 8 have minor errors related to not using the build argument variable.
- Criteria 3 and 4 are missing entirely from the Dockerfile.
- Criterion 9 has an error due to incorrect source path setup because of missing `APP_DIR` environment variable.