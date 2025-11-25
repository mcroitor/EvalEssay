# Assessment No: 5

## Date: 2025-11-25 13:54:32

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | The argument is defined but after the FROM statement, which is incorrect order. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing `AS builder`, and the order is incorrect.                     |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly defined.                                                    |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}`, which might not work as expected in some contexts. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrect command: `COPY --builder`, should be `COPY`.                |
| 6   | `RUN composer install`                                      | 10     | Correctly defined.                                                    |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | The argument is defined but after the FROM statement, which is incorrect order. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing `AS builder`, and the order is incorrect.                     |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path, should be `/composer/vendor`.                  |
| 10  | `COPY ./site/ /var/www/html/`                               | 8      | Uses `.`, which is incorrect; it should be `./site/`.                 |

Total Score: 52/100 points

Notes:
- The order of commands is incorrect, leading to deductions.
- There are some typos and missing parts in the Dockerfile commands.