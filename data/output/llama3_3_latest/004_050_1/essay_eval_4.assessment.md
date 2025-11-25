# Assessment No: 4

## Date: 2025-11-25 13:37:15

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Typo: ${APP_DIR} should be used for consistency, but $APP_DIR is also valid in this context. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Typo: $APP_DIR is used instead of ${APP_DIR}, but both are valid. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Typo: Trailing slash in $APP_DIR/ is not necessary and differs from the instruction. |
| 6   | `RUN composer install`                                      | 0      | Not met: The command is missing. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Not met: The command is missing. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Not met: The command is missing and depends on the previous missing command. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Not met: The command is missing. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Not met: The command is missing. |

Total Score: 44/100 points