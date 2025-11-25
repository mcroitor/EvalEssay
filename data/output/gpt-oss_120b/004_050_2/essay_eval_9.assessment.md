# Assessment No: 9

## Date: 2025-11-24 18:24:09

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Argument is defined, but placed **after** the `FROM` line, so it is misplaced (‑2 points). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the required `AS builder` alias and also placed before the argument; command is incorrect. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly sets the environment variable. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correct; using `$APP_DIR` works equivalently. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Uses an invalid `--builder` flag and therefore does not match the required syntax. |
| 6   | `RUN composer install`                                      | 10     | Correct command. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Argument is present but placed **after** the `FROM` line, so it is misplaced (‑2 points). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct base image specification. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and uses wrong source path; does not meet the criterion. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the whole context (`.`) instead of the `./site` directory. |
|     | **Total**                                                   | **56** | |

**Total Score:** 56/100 points