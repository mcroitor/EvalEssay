# Assessment No: 86

## Date: 2025-11-24 20:36:26

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 5      | Defined after the `FROM` line; correct value but wrong order. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Missing the `AS builder` alias. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correct (uses `$APP_DIR`, which is acceptable). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Added an invalid `--builder` flag; path otherwise correct. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 5      | Defined after the `FROM php` line; correct value but wrong order. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct syntax. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 5      | Missing `--from=builder` and source path; copies from wrong location. |
| 10  | `COPY ./site/ /var/www/html/`                               | 5      | Copies entire context (`.`) instead of `./site`. |
|     | **Total**                                                   | **66** |       |

**Total Score:** 66/100 points