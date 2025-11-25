# Assessment No: 13

## Date: 2025-11-24 18:31:07

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Present but placed **after** the `FROM composer` line (order issue, -2 points). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing `AS builder` alias and placed before the ARG (does not meet criterion). |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` instead of `${APP_DIR}` – still valid, no typo. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Uses invalid `--builder` flag and incorrect syntax; does not meet criterion. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Present but placed **after** the `FROM php` line (order issue, -2 points). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct syntax (order issue already penalised in criterion 7). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source path; does not meet criterion. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies entire context (`.`) instead of `./site/`; does not meet criterion. |
|     | **Total**                                                   | **56** | |

**Total Score:** 56/100 points