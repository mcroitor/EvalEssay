# Assessment No: 7

## Date: 2025-11-25 13:55:43

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | The argument is missing entirely from the student's response.         |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | The base image definition is missing entirely from the student's response. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | The environment variable setting is missing entirely from the student's response. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | The working directory command is missing entirely from the student's response. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | The copy command for composer.json is missing entirely from the student's response. |
| 6   | `RUN composer install`                                      | 10     | This command is present and correct, but it is misplaced in order.     |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | The argument for PHP version is missing entirely from the student's response. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | The base image definition for PHP is missing entirely from the student's response. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | This command is missing entirely from the student's response.          |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | The copy command for site files is missing entirely from the student's response. |

Total Score: [6 - (4 * 2)]/100 = 6/100 points

Notes:
- The only correct command present was `RUN composer install`, but it was misplaced, leading to a deduction of 8 points.
- All other criteria were not met at all, resulting in zero points for those lines.