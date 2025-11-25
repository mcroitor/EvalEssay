# Assessment No: 29

## Date: 2025-11-24 18:58:13

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct declaration, but placed after the first FROM (order issue). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing the required `AS builder` alias. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Exact match. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Uses `$APP_DIR` instead of `${APP_DIR}` – still valid. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Added invalid `--builder` flag and syntax deviates from required command. |
| 6   | `RUN composer install`                                      | 10     | Exact match. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct declaration, but placed after the second FROM (order issue). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Exact match. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and uses wrong source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the whole context (`.`) instead of `./site/`. |
|     | **Total**                                                   | **70** | Order penalties: -2 for misplaced `ARG COMPOSER_VERSION`, -2 for misplaced `ARG PHP_VERSION` → **66** points. |

**Total Score: 66/100 points**