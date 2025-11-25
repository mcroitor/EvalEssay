# Assessment No: 4

## Date: 2025-11-25 13:53:37

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | The criterion is fully met without any errors.                        |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | This line is missing from the student response.                       |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | This line is missing from the student response.                       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | This line is missing from the student response.                       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | The student only copied `./site`, not specifically `composer.json`.   |
| 6   | `RUN composer install`                                      | 0      | This line is missing from the student response.                       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | This line is missing from the student response.                       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | This line is missing from the student response.                       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | This line is missing from the student response.                       |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | The student only copied `./site`, but did not specify the destination.|
|     | **Total**                                                   | **10** |                                                                       |

Total Score: 10/100 points

Notes:
- Multiple criteria are missing from the student response.
- Misplaced command deduction does not apply as many commands are absent.