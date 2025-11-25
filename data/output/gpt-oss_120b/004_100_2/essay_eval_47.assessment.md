# Assessment No: 47

## Date: 2025-11-24 19:30:12

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax, no errors. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct syntax, no errors. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct syntax, no errors. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correct syntax, no errors. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Extra trailing “/” after `${APP_DIR}` (minor typo). |
| 6   | `RUN composer install`                                      | 10     | Correct syntax, no errors. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct syntax, no errors. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct syntax, no errors. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Uses `${APP_DIR}` variable instead of literal path (acceptable but deviates from exact command). |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct syntax, no errors. |
|     | **Total**                                                   | **96** | |

Total Score: 96/100 points