# Assessment No: 41

## Date: 2025-11-24 19:19:06

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Defined after the `FROM` line, so it cannot be used in the `FROM` statement. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the `AS builder` alias. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly sets the environment variable. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` which is functionally equivalent to `${APP_DIR}`. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Uses an invalid `--builder` flag and does not match the required syntax. |
| 6   | `RUN composer install`                                      | 10     | Correct command. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Defined after the `FROM php` line, so it cannot be used in that `FROM`. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct syntax, though the preceding `ARG` is misplaced. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and uses an incorrect source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the entire context (`.`) instead of the `./site/` directory. |
|     | **Total**                                                   | **30** |       |

Total Score: 30/100 points