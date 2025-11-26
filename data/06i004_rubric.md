### Points explanation

- 0 points: The criteria is not met or there are multiple errors.
- 5 points: The criteria is partially met, with maximum three typo errors per command.
- 8 points: The criteria is mostly met, with maximum one typo errors per command.
- 10 points: The criteria is fully met without any errors.

### Rubric table

| Nr. | Criteria                                                    | Max Points |
| --- | ----------------------------------------------------------- | ---------- |
| 1   | `ARG COMPOSER_VERSION=2.7`                                  | 10         |
| 2   | `FROM composer:${COMPOSER_VERSION} AS builder`              | 10         |
| 3   | `ENV APP_DIR=/composer`                                     | 10         |
| 4   | `WORKDIR ${APP_DIR}`                                        | 10         |
| 5   | `COPY ./site/composer.json ${APP_DIR}`                      | 10         |
| 6   | `RUN composer install`                                      | 10         |
| 7   | `ARG PHP_VERSION=8.1`                                       | 10         |
| 8   | `FROM php:${PHP_VERSION}-fpm`                               | 10         |
| 9   | `COPY --from=builder /composer/vendor /var/www/html/vendor` | 10         |
| 10  | `COPY ./site/ /var/www/html/`                               | 10         |
|     | **Total**                                                   | **100**    |

### Additional

If the commands are not in the correct order, a deduction of 2 points will be applied for each misplaced command.

The minimum score is 0 points.

Attention:

- typo errors refer to minor mistakes such as misspellings or incorrect characters that do not significantly alter the command's functionality.
- the variable names can be used with braces or without braces, e.g., both `$APP_DIR` and `${APP_DIR}` are acceptable.
- the slashes in the end of the paths are optional, e.g., both `/var/www/html` and `/var/www/html/` are acceptable (if the final object is a directory).
- literals instead of variables are not accepted, e.g., `FROM composer:2.7` is incorrect.
