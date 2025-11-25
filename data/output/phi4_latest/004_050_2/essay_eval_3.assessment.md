# Assessment No: 3

## Date: 2025-11-25 13:53:09

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Missing 'AS builder' at the end of line. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     |       |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Used `$APP_DIR` instead of `${APP_DIR}`. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Typo in command: `COPY --builder` should be `COPY`. |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Should be placed before the second FROM statement. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Misplaced; should follow ARG PHP_VERSION. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing 'AS builder' in FROM statement, and misplaced. |
| 10  | `COPY ./site/ /var/www/html/`                               | 8      | Typo: Used `./*` instead of `./site/`. |

Total Score: 54/100 points

Notes:
- The order of commands is incorrect, leading to deductions.
- Several commands have minor typos or syntax errors.