# Assessment No: 10

## Date: 2025-11-25 13:28:50

| Nr. | Criterion                                                   | Points | Notes                                                        |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------------------------------ |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Fully met without errors.                                   |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Fully met without errors.                                   |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Fully met without errors.                                   |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Missing curly braces around APP_DIR, but the command works as expected. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | The trailing slash is not necessary but doesn't cause an error; missing curly braces around APP_DIR. |
| 6   | `RUN composer install`                                      | 10     | Fully met without errors.                                   |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Fully met without errors.                                   |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Fully met without errors.                                   |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | The source path is correct, but it references $APP_DIR directly instead of using /composer; missing curly braces around APP_DIR in the original command. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Fully met without errors.                                   |

Total Score: 94/100 points