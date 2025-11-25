# Assessment No: 66

## Date: 2025-11-24 20:02:26

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Misplaced (appears after an `ENV` instead of directly after ARG) |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | First occurrence misplaced; second duplicate `ENV` is unnecessary |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor typo) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR/` and trailing slash (minor typo) |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Uses `${APP_DIR}` variable instead of literal path (minor typo) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |
|     | **Total**                                                   | **88** | Deductions: 6 points for three misplaced commands (2 pts each) |

Total Score: 88/100 points