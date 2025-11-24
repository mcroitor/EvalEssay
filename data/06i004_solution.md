## Solution example

```Dockerfile
# Use the specified Composer version as the builder stage
ARG COMPOSER_VERSION=2.7
FROM composer:${COMPOSER_VERSION} AS builder
# Set the application directory
ENV APP_DIR=/composer
WORKDIR $APP_DIR
# Copy the composer.json file to the application directory
COPY ./site/composer.json $APP_DIR/
# Install dependencies using composer
RUN composer install
# Use the specified PHP version for the final image
ARG PHP_VERSION=8.1
FROM php:${PHP_VERSION}-fpm
ENV APP_DIR=/composer
# Copy installed dependencies from the builder stage to the final image
COPY --from=builder ${APP_DIR}/vendor /var/www/html/vendor
# Copy application files to the final image
COPY ./site/ /var/www/html/
```
