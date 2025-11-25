# Assessment No: 59

## Date: 2025-11-24 19:50:24

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Command appears before the builder `FROM` line (misordered). |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}` (minor syntax deviation). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR/` and trailing slash (minor syntax deviation). |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Variable expands correctly to `/composer/vendor`. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |
|     | **Total**                                                   | **94** | Deduction of 2 points for the misordered `ENV APP_DIR` command. |

Total Score: 94/100 points