# Assessment No: 92

## Date: 2025-11-24 20:47:14

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 5      | Correct syntax but placed after the `FROM` line (misordered). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the `AS builder` alias; also placed before the `ARG`. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correct (using `$APP_DIR` is acceptable). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Uses an invalid `--builder` flag and therefore does not match the required command. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 5      | Correct syntax but placed after the `FROM php` line (misordered). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Syntax correct, but the preceding `ARG` is misplaced, so the variable may not be resolved. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and incorrect source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the whole context (`.`) instead of the `./site` directory. |
|     | **Total**                                                   | **45** | |

Total Score: 45/100 points