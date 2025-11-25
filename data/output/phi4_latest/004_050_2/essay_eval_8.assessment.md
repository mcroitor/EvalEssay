# Assessment No: 8

## Date: 2025-11-25 13:56:34

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | The argument is defined after the FROM statement, which is incorrect.|
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Correct command but misplaced; should be before ARG and ENV commands. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly defined.                                                    |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Incorrect syntax, should use `$APP_DIR`.                              |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Correct command but misplaced; also uses incorrect COPY syntax.       |
| 6   | `RUN composer install`                                      | 10     | Correctly defined and placed after the copy of `composer.json`.       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | The argument is defined after the FROM statement, which is incorrect.|
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Correct command but misplaced; should be before ARG and COPY commands.|
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path, should use `$APP_DIR`.                         |
| 10  | `COPY ./site/ /var/www/html/`                               | 8      | Correct command but misplaced; also uses incorrect COPY syntax.       |

Total Score: 52/100 points

Notes:
- Misplaced commands resulted in a deduction of 16 points (2 points each for 8 misplaced commands).
- Typo errors and incorrect syntax led to additional deductions.