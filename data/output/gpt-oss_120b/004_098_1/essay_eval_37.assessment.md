# Assessment No: 37

## Date: 2025-11-24 19:12:51

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | ENV appears before the first FROM (order violation) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     |       |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     |       |
| 6   | `RUN composer install`                                      | 10     |       |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     |       |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     |       |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     |       |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     |       |

**Total Score:** 96/100 points

*Notes:* Two commands are out of the expected order (the first `ENV` before the initial `FROM` and an extra `ENV` after the second `FROM`). According to the rubric, each misplaced command incurs a 2‑point deduction, resulting in a 4‑point reduction from the perfect score.