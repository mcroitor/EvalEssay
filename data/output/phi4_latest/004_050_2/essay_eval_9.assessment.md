# Assessment No: 9

## Date: 2025-11-25 13:57:15

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | The argument is defined after the FROM statement, causing a misplaced command. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Misplaced and missing 'AS builder'.                                   |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly defined without errors.                                     |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}`, which is a typo error.       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Misplaced and uses incorrect syntax with `--builder`.                 |
| 6   | `RUN composer install`                                      | 8      | Correct command but misplaced due to previous errors.                 |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | The argument is defined after the FROM statement, causing a misplaced command. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Misplaced and missing 'AS builder'.                                   |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Misplaced, incorrect source path, and uses `$APP_DIR`.                |
| 10  | `COPY ./site/ /var/www/html/`                               | 8      | Correct command but misplaced due to previous errors.                 |

Total Score: 50/100 points

Notes:
- The order of commands is incorrect, leading to multiple deductions.
- There are syntax and path errors in several lines.
- Misplaced `ARG` definitions affect the correct setup of base images.