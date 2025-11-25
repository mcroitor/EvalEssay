# Assessment No: 15

## Date: 2025-11-24 18:34:29

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Argument defined after the `FROM` line; should be before it. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing `AS builder` alias and placed before the ARG definition. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly defined. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrect flag `--builder`, wrong syntax, and path issues. |
| 6   | `RUN composer install`                                      | 10     | Correct command. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Defined after the `FROM php` line; should be before it. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | `PHP_VERSION` not available at this point due to misplaced ARG. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder`, wrong source path, and target path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies entire context (`.`) instead of `./site/`. |
|     | **Total**                                                   | **38** |       |

Total Score: 38/100 points