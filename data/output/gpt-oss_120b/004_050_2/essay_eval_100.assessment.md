# Assessment No: 100

## Date: 2025-11-24 21:01:03

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct value but placed **after** the FROM line; should be defined before it (order issue). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the `AS builder` alias and does not match the required syntax. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` – a minor syntax deviation (one typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added invalid `--builder` flag and incorrect path syntax; does not meet the requirement. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct value but placed **after** the FROM line; should be before it (order issue). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and uses wrong source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the entire context (`.`) instead of the `./site` directory. |
|     | **Total**                                                   | **54** | Deduction of 4 points for two misplaced ARG commands (‑2 pts each). |  

**Total Score:** 54/100 points