# Assessment No: 15

## Date: 2025-11-24 18:34:08

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Uses literal `composer:2.7` instead of the variable. |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Uses hard‑coded path `/composer` and does not reference `APP_DIR`. |
| 6   | `RUN composer install`                                      | 10     | Correct. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Uses literal `php:8.1-fpm` instead of the variable. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct. |
|     | **Order penalty**                                           | **-2** | `COPY ./site/composer.json` appears before a `WORKDIR` (which is missing) and thus is out of the expected sequence. |
|     | **Total**                                                   | **48** | |

**Total Score: 48/100 points**