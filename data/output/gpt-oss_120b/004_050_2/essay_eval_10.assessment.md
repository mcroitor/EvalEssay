# Assessment No: 10

## Date: 2025-11-25 14:15:35

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 8      | Defined correctly but placed **after** the FROM line (order issue). |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 3      | Missing the required `AS builder` alias and appears before the ARG (order issue). |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Correct syntax but appears before the ARG definition (order issue). |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correct command (using `$APP_DIR` would also work). |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Uses an invalid `--builder` flag and `$APP_DIR/` syntax; does not match required command. |
| 6   | `RUN composer install`                                      | 10     | Correct command. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 8      | Defined correctly but placed **after** the FROM line (order issue). |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 8      | Correct command but appears before the ARG (order issue). |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing `--from=builder` and uses wrong source path. |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Copies the whole context (`.`) instead of the `./site/` directory. |

**Total Score:** 63/100 points