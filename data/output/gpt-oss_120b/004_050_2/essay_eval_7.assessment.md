# Assessment No: 7

## Date: 2025-11-24 18:20:41

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct value but placed **after** the `FROM` line (order error). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing `AS builder` alias; command does not match required syntax. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` instead of `${APP_DIR}` – still valid, no typo. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Uses invalid `--builder` flag and omits required `--from=builder`. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct value but placed **after** the `FROM php` line (order error). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and incorrect source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies entire context (`.`) instead of `./site/`. |
|     | **Total**                                                   | **66** | Deduction of 4 points for two misplaced `ARG` commands. |

**Total Score:** 66/100 points