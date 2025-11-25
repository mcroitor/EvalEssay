# Assessment No: 81

## Date: 2025-11-24 20:27:51

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct value but placed **after** the `FROM` line (misordered). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the required `AS builder` alias. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` instead of `${APP_DIR}` – functionally equivalent. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Uses an invalid `--builder` flag and does not match the required source path. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct value but placed **after** the `FROM php` line (misordered). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and uses wrong source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the whole context (`.`) instead of `./site/`. |
|     | **Total**                                                   | **66** | Deduction of 4 points for two misordered commands (2 pts each). |

**Total Score:** 66/100 points