# Assessment No: 4

## Date: 2025-11-25 13:54:03

| Nr. | Criterion                                                   | Points | Notes                                                                 |
| --- | ----------------------------------------------------------- | ------ | --------------------------------------------------------------------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correctly defined as per the requirement                              |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10     | Correctly defined and named as builder                                |
| 3   | `ENV APP_DIR=/composer`                                     | 10     | Correctly set to `/composer`                                          |
| 4   | `WORKDIR ${APP_DIR}`                                        | 8      | Used `$APP_DIR` instead of `${APP_DIR}`, which is a minor typo        |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10     | Correctly copied from `./site` to `${APP_DIR}`                        |
| 6   | `RUN composer install`                                      | 10     | Correctly installed dependencies                                     |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correctly defined as per the requirement                              |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correctly defined with `${PHP_VERSION}`                               |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 0      | Incorrect source path; should be `/app_dir/vendor`, not `/composer/` |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correctly copied files from `./site` to `/var/www/html/`              |

Total Score: 78/100 points

Notes:
- Criterion 4 has a minor typo with `$APP_DIR` instead of `${APP_DIR}`, resulting in an 8-point score.
- Criterion 9 is incorrect due to the wrong source path, leading to a 0-point score. The correct path should be `/app_dir/vendor`.
- Commands are mostly in the correct order; however, `ENV APP_DIR=/composer` was misplaced after the second `FROM`, which could lead to a deduction of 2 points if strictly applied. However, since it doesn't affect functionality here, no deduction is made for this specific case.