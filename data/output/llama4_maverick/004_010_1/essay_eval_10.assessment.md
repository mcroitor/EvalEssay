# Assessment No: 10

## Date: 2025-11-25 13:27:12

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Fully met                                                    |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Not met, missing                                             |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Not met, missing                                             |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Not met, missing                                             |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Partially met but incorrect as it should copy only composer.json, not the entire ./site directory |
| 6   | `RUN composer install`                                      | 0      | Not met, missing                                             |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Not met, missing                                             |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Not met, missing                                             |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Not met, missing                                             |
| 10  | `COPY ./site/ /var/www/html/`                               | 5      | Partially met but the command is misplaced and incorrect     |

Total Score: 15/100 points