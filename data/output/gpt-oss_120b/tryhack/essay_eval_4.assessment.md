# Assessment No: 4

## Date: 2025-11-25 14:05:57

| Nr. | Criterion                                                   | Points | Notes                                 |
| --- | ----------------------------------------------------------- | ------ | ------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Command not present in response.      |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Command not present in response.      |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Command not present in response.      |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Command not present in response.      |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Command not present in response.      |
| 6   | `RUN composer install`                                      | 0      | Command not present in response.      |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Command not present in response.      |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Command not present in response.      |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Command not present in response.      |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Command not present in response.      |
|     | **Total**                                                   | **0**  | No Dockerfile commands provided.      |

Total Score: 0/100 points