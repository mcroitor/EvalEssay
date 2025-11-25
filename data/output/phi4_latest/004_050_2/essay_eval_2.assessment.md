# Assessment No: 2

## Date: 2025-11-25 13:52:31

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | The argument is defined after the FROM statement, causing a misplaced command deduction of 2 points. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | The FROM statement does not include the 'AS builder' part and uses an undefined variable. Misplaced order also affects this criterion. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly defined without errors.                                      |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}`, which is a typo error, but it's mostly correct. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | The COPY command uses incorrect syntax with `--builder`. Misplaced order also affects this criterion. |
| 6   | `RUN composer install`                                      | 10     | Correctly defined without errors.                                      |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Defined after the FROM statement, causing a misplaced command deduction of 2 points. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Uses an undefined variable and is misplaced before ARG definition for PHP_VERSION. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Misplaced order, uses an incorrect path `/composer/vendor`, and 'builder' is not defined in the FROM statement. |
| 10  | `COPY ./site/ /var/www/html/`                               | 8      | Uses `. /var/www/html/` instead of `./site/ /var/www/html/`, which is a typo error, but it's mostly correct. |

Total Score: 42/100 points