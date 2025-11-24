## Dockerfile for PHP Application with Composer

Write a `Dockerfile` that meets the following criteria:

1. The build argument `COMPOSER_VERSION` is set to **2.7**
2. The base image composer with the tag `COMPOSER_VERSION` is defined and named as builder
3. The environment variable `APP_DIR` is set to **/composer**
4. The working directory is set to `APP_DIR`
5. The `composer.json` file is copied to the `APP_DIR` directory from the `./site` directory
6. Dependencies from the `composer.json` file are installed using composer install
7. The build argument `PHP_VERSION` is set to **8.1**
8. The base image php with the tag `${PHP_VERSION}-fpm` is defined
9. Installed dependencies are copied from the builder image, the `vendor` directory, to the working directory `/var/www/html` of the final image
10. Files from the `./site` directory are copied to the working directory `/var/www/html` of the final image
