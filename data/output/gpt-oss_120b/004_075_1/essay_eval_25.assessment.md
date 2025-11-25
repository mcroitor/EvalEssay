# Assessment No: 25

## Date: 2025-11-24 18:51:43

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct declaration. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Uses literal tag `2.7` instead of the `${COMPOSER_VERSION}` variable. |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct environment variable. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Misspelled as `WORK DIR` and variable name misspelled `$AP_DIR`. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correct source and destination; variable usage is acceptable. |
| 6   | `RUN composer install`                                      | 10     | Correct command. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct declaration. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Uses literal tag `8.1-fpm` instead of the `${PHP_VERSION}` variable. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct copy from builder; path matches expected. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct copy of site files. |
|     | **Total**                                                   | **78** | |

Total Score: 78/100 points