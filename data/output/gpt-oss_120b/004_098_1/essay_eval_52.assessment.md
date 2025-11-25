# Assessment No: 52

## Date: 2025-11-24 19:38:36

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Fully correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Correct command but placed after `ENV`, order penalty (-2) |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Correct command but placed before `FROM`, order penalty (-2) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}` (one minor typo) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR/` and trailing slash (one minor typo) |
| 6   | `RUN composer install`                                      | 10     | Fully correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Fully correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Fully correct |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Fully correct (uses variable but resolves correctly) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Fully correct |
|     | **Total**                                                   | **92** | |

Total Score: 92/100 points