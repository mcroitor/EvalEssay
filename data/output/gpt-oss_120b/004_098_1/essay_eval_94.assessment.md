# Assessment No: 94

## Date: 2025-11-24 20:51:13

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct content, but placed before the `FROM` line (order issue) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${APP_DIR}` (minor typo) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR/` and trailing slash (minor typo) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses `${APP_DIR}` variable (expands to `/composer`), acceptable |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |
|     | **Order deductions**                                        | -4     | Two commands misplaced (`ENV APP_DIR` before `FROM` and extra `ENV` after PHP stage) → 2 pts each |
|     | **Total**                                                   | **92** | 92/100 points |