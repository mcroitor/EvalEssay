# Assessment No: 2

## Date: 2025-11-25 13:52:41

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined as per the requirement.                             |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined and named as builder.                               |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set to `/composer`.                                         |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, minor typo error.            |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly copied from `./site` to `${APP_DIR}`.                       |
| 6   | `RUN composer install`                                      | 10     | Correctly installed dependencies using composer.                     |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined as per the requirement.                             |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly defined with `${PHP_VERSION}`.                              |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 6      | Used `/composer/vendor` instead of `${APP_DIR}/vendor`, typo error.   |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copied files from `./site` to `/var/www/html`.              |

Total Score: 84/100 points

Notes:
- Deduction of 2 points for the misplaced `ENV APP_DIR=/composer` in the final image section.
- Minor typo errors in `WORKDIR` and `COPY --from=builder` commands.