# Assessment No: 56

## Date: 2025-11-24 19:44:25

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 5      | Uses literal version (`composer:2.7`) instead of the `${COMPOSER_VERSION}` variable. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 5      | Destination path is correct (`/composer`) but does not use the `${APP_DIR}` variable. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 5      | Uses literal tag (`php:8.1-fpm`) instead of the `${PHP_VERSION}` variable. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct. |
|     | **Total**                                                   | **61** | Deductions: 2 pts each for misplaced `COPY` and `RUN` commands (‑4 pts). |  

Total Score: 61/100 points