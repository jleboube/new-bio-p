FROM php:8.1-apache

# Install required extensions
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy application code
COPY ./src /var/www/html/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html
