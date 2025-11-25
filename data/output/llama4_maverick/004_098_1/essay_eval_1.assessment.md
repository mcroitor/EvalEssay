# Assessment No: 1

## Date: 2025-11-25 13:00:32

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Fully met                                                    |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Fully met                                                    |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Fully met                                                    |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | `$APP_DIR` should be `${APP_DIR}`, minor syntax error        |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | `$APP_DIR/` should be `${APP_DIR}`, minor syntax error       |
| 6   | `RUN composer install`                                      | 10     | Fully met                                                    |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Fully met                                                    |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Fully met                                                    |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | `${APP_DIR}/vendor` should be `/composer/vendor`, variable not necessary but correct nonetheless |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Fully met                                                    |

Total Score: 94/100 points