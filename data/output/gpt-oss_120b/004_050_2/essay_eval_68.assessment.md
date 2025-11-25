# Assessment No: 68

## Date: 2025-11-24 20:05:19

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Present and correct, but placed after the `FROM` line (misordered). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 3      | Base image reference correct, missing `AS builder`; also misordered. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct and properly placed. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor typo). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Incorrect syntax (`--builder` flag, wrong variable form, extra slash). |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Correct value but placed after the `FROM php` line (misordered). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Correct image, but placed before the `ARG PHP_VERSION` definition (misordered). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and incorrect source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies whole context (`.`) instead of `./site/`. |
|     | **Total**                                                   | **65** | |

Total Score: 65/100 points