# Assessment No: 4

## Date: 2025-11-24 18:15:06

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 0      | Missing or incorrect argument |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 0      | Missing FROM statement |
| 3   | `ENV APP_DIR=/composer`                                     | 0      | Missing environment variable |
| 4   | `WORKDIR ${APP_DIR}`                                        | 0      | Missing WORKDIR directive |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 0      | Missing or incorrect COPY |
| 6   | `RUN composer install`                                      | 0      | Missing RUN command |
| 7   | `ARG PHP_VERSION=8.1`                                       | 0      | Missing PHP version argument |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 0      | Missing second FROM statement |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Missing copy from builder |
| 10  | `COPY ./site/ /var/www/html/`                               | 0      | Missing final copy |
|     | **Total**                                                   | **0**  | 0/100 points |