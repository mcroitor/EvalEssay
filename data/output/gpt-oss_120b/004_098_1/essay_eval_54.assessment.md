# Assessment No: 54

## Date: 2025-11-24 19:42:06

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct (misplaced in order) |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct (misplaced in order) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}` (minor typo) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR/` and variable syntax difference (minor typo) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Used `${APP_DIR}` which resolves correctly |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |
|     | **Total (before order penalty)**                            | **96** |       |
|     | **Order penalty (2 commands × 2 pts)**                      | **‑4** |       |
|     | **Total Score**                                             | **92** | 92/100 points |