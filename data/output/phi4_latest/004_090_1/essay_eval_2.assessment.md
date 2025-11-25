# Assessment No: 2

## Date: 2025-11-25 13:52:38

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined with no errors.                                     |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined with no errors.                                     |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly defined with no errors.                                     |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, which is a minor typo error. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Used `$APP_DIR/` instead of `${APP_DIR}`, which is a minor typo error.|
| 6   | `RUN composer install`                                      | 10     | Correctly defined with no errors.                                     |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined with no errors.                                     |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly defined with no errors.                                     |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect path `/composer/vendor`, should be `${APP_DIR}/vendor`.     |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly defined with no errors.                                     |

Total Score: 76/100 points

Notes:
- Criterion 4 and 5 have minor typo errors due to incorrect variable usage.
- Criterion 9 has a significant error in the path, leading to zero points for that criterion.