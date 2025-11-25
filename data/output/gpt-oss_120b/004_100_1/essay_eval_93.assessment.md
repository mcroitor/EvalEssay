# Assessment No: 93

## Date: 2025-11-24 20:49:42

| Nr. | Criterion                                                   | Points | Notes                                 |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct                               |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Uses `$COMPOSER_VERSION` instead of `${…}` (minor typo) |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct                               |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Uses `$APP_DIR` instead of `${…}` (minor typo) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR/` and trailing slash (minor typo) |
| 6   | `RUN composer install`                                      | 10     | Correct                               |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct                               |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Uses `$PHP_VERSION` instead of `${…}` (minor typo) |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Destination path misspelled (`vendr`) and does not match required path |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct                               |
|     | **Total**                                                   | **82** |                                       |

Total Score: 82/100 points