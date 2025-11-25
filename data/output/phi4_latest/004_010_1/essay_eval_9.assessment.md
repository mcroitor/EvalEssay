# Assessment No: 9

## Date: 2025-11-25 13:57:01

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | The criterion is fully met without any errors.                        |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | This line is missing from the student response.                       |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | This line is missing from the student response.                       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | This line is missing from the student response.                       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | The command is incorrect; it should specify the destination directory.|
| 6   | `RUN composer install`                                      | 0      | This line is missing from the student response.                       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | This line is missing from the student response.                       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | This line is missing from the student response.                       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | This line is missing from the student response.                       |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | The command is incomplete; it should specify both source and destination directories correctly. |

Total Score: 10/100 points

Notes:
- Several criteria are not met as key lines are missing from the student response.
- Misplaced or incorrect commands result in a lack of fulfillment for several criteria.