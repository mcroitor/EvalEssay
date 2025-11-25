# Assessment No: 95

## Date: 2025-11-24 20:53:00

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correct (order issue noted separately) |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correct (appears twice; extra instance noted) |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10     | Correct (`WORKDIR $APP_DIR` is valid) |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correct (`$APP_DIR/` works) |
| 6   | `RUN composer install`                                      | 10     | Correct |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10     | Correct (`${APP_DIR}` resolves to `/composer`) |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct |
|     | **Total before order deductions**                           | **100**| |
|     | Order deductions (6 misplaced commands × 2 pts)            | **-12**| |
|     | **Final Score**                                             | **88** | |

Total Score: 88/100 points