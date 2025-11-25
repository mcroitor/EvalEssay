# Assessment No: 7

## Date: 2025-11-25 13:43:42

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     |       |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     |       |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Typo: ${APP_DIR} should be used for consistency, but $APP_DIR is also valid in this context. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Same typo as above, but considering the context and Dockerfile syntax, it's mostly correct. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | The student used $APP_DIR instead of ${APP_DIR}, which is a minor inconsistency but does not affect functionality. |
| 6   | `RUN composer install`                                      | 0      | Not present in the provided Dockerfile snippet. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Not present in the provided Dockerfile snippet. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Not present in the provided Dockerfile snippet. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Not present in the provided Dockerfile snippet. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Not present in the provided Dockerfile snippet. |

Total Score: 44/100 points