# Assessment No: 17

## Date: 2025-11-24 18:38:26

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct syntax; placed after `ENV` (misordered, –2 pts) |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct syntax; placed before `FROM` (misordered, –2 pts) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correct (uses `$APP_DIR`, which is acceptable) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correct syntax |
| 6   | `RUN composer install`                                      | 10     | Correct syntax |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct syntax |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct syntax |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct syntax |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct syntax |
|     | **Total**                                                   | **96** | 2 points deducted for each of the misordered commands (criteria 2 & 3) |  

Total Score: 96/100 points