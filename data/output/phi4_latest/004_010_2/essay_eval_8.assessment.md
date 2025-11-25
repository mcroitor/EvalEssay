# Assessment No: 8

## Date: 2025-11-25 13:56:24

Below is an assessment of the student's response based on the provided rubric:

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | The command is missing entirely.                                      |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | The command is missing entirely.                                      |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | The command is missing entirely.                                      |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | The command is missing entirely.                                      |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | The command is missing entirely.                                      |
| 6   | `RUN composer install`                                      | 10     | This command is present and correct, but out of order.                |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | The command is missing entirely.                                      |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | The command is missing entirely.                                      |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | The command is missing entirely.                                      |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | The command is missing entirely.                                      |

Total Score: 10/100 points

**Notes:**  
- The student's response contains only one correct command (`RUN composer install`) but it is out of order, which does not affect the score for this specific criterion.
- All other required commands are missing, resulting in a total score of 10 points.