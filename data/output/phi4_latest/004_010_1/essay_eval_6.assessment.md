# Assessment No: 6

## Date: 2025-11-25 13:55:00

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | The criterion is fully met without any errors.                        |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | This line is missing entirely.                                        |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | This line is missing entirely.                                        |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | This line is missing entirely.                                        |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | The command is incomplete; it should specify the destination directory.|
| 6   | `RUN composer install`                                      | 0      | This line is missing entirely.                                        |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | This line is missing entirely.                                        |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | This line is missing entirely.                                        |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | This line is missing entirely.                                        |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | The command is incomplete; it should specify the source directory.    |

Total Score: 10/100 points

Notes:
- Several criteria are not met due to missing lines.
- The order of commands is incorrect, but since many lines are missing, no additional deductions for misplaced commands were applied.