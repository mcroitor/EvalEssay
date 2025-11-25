# Assessment No: 35

## Date: 2025-11-24 19:09:18

| Nr. | Criterion                                                   | Points | Notes |
| --- | ----------------------------------------------------------- | ------ | ----- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10     | Correct syntax and value. |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 8      | Command is correct but placed after `ENV APP_DIR`; misplaced → -2 points. |
| 3   | `ENV APP_DIR=/composer`                                     | 8      | Correct command but appears before the `FROM` line; misplaced → -2 points. |
| 4   | `WORKDIR ${APP_DIR}`                                        | 6      | Uses `$APP_DIR` instead of `${APP_DIR}` (one typo) and is out of order (should follow `ENV`); typo → 8, misplaced → -2. |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 8      | Uses `$APP_DIR` (one typo) but otherwise correct; within allowed typo limit. |
| 6   | `RUN composer install`                                      | 10     | Correct command and order. |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10     | Correct syntax and placement. |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10     | Correct command and order. |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 8      | Uses `${APP_DIR}` instead of literal `/composer` (one typo); otherwise correct. |
| 10  | `COPY ./site/ /var/www/html/`                               | 10     | Correct command and order. |
|     | **Total**                                                   | **88** | |

Total Score: 88/100 points