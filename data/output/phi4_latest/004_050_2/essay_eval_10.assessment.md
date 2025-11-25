# Assessment No: 10

## Date: 2025-11-25 13:57:55

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | The argument is defined after the FROM statement, which is incorrect order. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | The FROM command is missing the ARG substitution and the alias 'AS builder'. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly defined without errors.                                      |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}`, which is a minor typo.       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrect COPY command syntax, uses `--builder`.                       |
| 6   | `RUN composer install`                                      | 10     | Correctly defined without errors.                                      |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | The argument is defined after the FROM statement, which is incorrect order. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | The FROM command is missing the ARG substitution.                      |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path, should be `/composer/vendor`.                   |
| 10  | `COPY ./site/ /var/www/html/`                               | 8      | Uses `. /var/www/html/` instead of `./site/ /var/www/html/`, which is a minor typo. |

Total Score: 52/100 points

Notes:
- Misplaced commands for ARG definitions (1, 7) result in deductions.
- Incorrect syntax and order issues lead to zero scores for criteria 2, 5, 8, and 9.
- Minor typos are present but do not significantly impact the functionality.