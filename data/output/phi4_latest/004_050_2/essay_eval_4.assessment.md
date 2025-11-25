# Assessment No: 4

## Date: 2025-11-25 13:53:52

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Placed after the first FROM, should be before it.                     |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly specified with build argument and alias.                    |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set the environment variable.                               |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, minor typo error.            |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrect command used: `COPY --builder`.                            |
| 6   | `RUN composer install`                                      | 10     | Correctly installed dependencies using composer.                     |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Placed after the first FROM, should be before it.                     |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly specified with build argument.                              |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path and missing `--from=builder`.                   |
| 10  | `COPY ./site/ /var/www/html/`                               | 8      | Used `. /var/www/html/` instead of `./site/ /var/www/html/`, minor typo error. |

Total Score: 64/100 points

Notes:
- Deduction for misplaced commands (ARGs after FROM): -4 points.
- Typo errors in COPY commands and variable usage resulted in additional deductions.