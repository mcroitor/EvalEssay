# Assessment No: 23

## Date: 2025-11-24 18:48:48

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax and value. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct usage. |
| 3   | `ENV APP_DIR=/composer`                                     | 6      | Command present but misplaced (appears before the first FROM and duplicated later); 2 pts deduction per misplaced instance. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correct ( `$APP_DIR` is acceptable). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correct path; trailing slash does not affect correctness. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Uses `${APP_DIR}` which expands to `/composer`; functionally correct. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct. |
|     | **Total**                                                   | **96** | |

Total Score: 96/100 points