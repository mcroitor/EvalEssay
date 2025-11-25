# Assessment No: 64

## Date: 2025-11-24 19:58:25

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Correct value but placed **after** the FROM line, so misplaced (‑2 points). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing `AS builder` and appears before the ARG, does not meet the requirement. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Fully correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Fully correct ( `$APP_DIR` is acceptable). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Uses invalid `--builder` flag and incorrect syntax; does not meet the requirement. |
| 6   | `RUN composer install`                                      | 10     | Fully correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Correct value but placed **after** the FROM line, so misplaced (‑2 points). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Fully correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and wrong source path; does not meet the requirement. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the whole context (`.`) instead of `./site`; does not meet the requirement. |
|     | **Total**                                                   | **56** | |

**Total Score:** 56/100 points