# Assessment No: 58

## Date: 2025-11-24 19:48:09

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Correct value but placed after `FROM`; 2‑point order penalty. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing `AS builder` alias; command does not match requirement. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Exact match. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` which is functionally equivalent; no errors. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added invalid `--builder` flag and incorrect syntax; command invalid. |
| 6   | `RUN composer install`                                      | 10     | Exact match. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Correct value but placed after `FROM php`; 2‑point order penalty. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Correct command but `ARG PHP_VERSION` defined after it, causing order issue; 2‑point penalty. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source/target paths. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies entire context (`.`) instead of `./site/`. |
|     | **Total**                                                   | **54** | |

**Total Score:** 54/100 points