# Set the base image
FROM php:8.1-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    zlib1g-dev \
    libxml2-dev \
    libzip-dev \
    libonig-dev \
    zip \
    curl \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install composer
COPY --from=composer /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www

# Change current user to root to create directories
USER root

# Create a directory for the composer cache and vendor files and give www-data ownership
RUN mkdir -p /var/www/.composer/cache/files/ && chown -R www-data:www-data /var/www/.composer
RUN mkdir -p /var/www/vendor && chown -R www-data:www-data /var/www/vendor

# Change current user to www
USER www-data

# Run composer install to install the dependencies
RUN composer install --optimize-autoloader --no-dev --no-interaction

# Change user to root
USER root

# Copy .env.example to .env and run php artisan key:generate
RUN cp /var/www/.env.example /var/www/.env && chown www-data:www-data /var/www/.env && su -s /bin/sh -c 'php /var/www/artisan key:generate' www-data

# Change the Apache port to 8080
RUN sed -i 's/80/8080/g' /etc/apache2/sites-available/000-default.conf /etc/apache2/ports.conf

# Configure Apache Document Root
ENV APACHE_DOCUMENT_ROOT /var/www/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Enable mod_rewrite
RUN a2enmod rewrite

RUN chown -R www-data:www-data /var/www/public && chmod -R 755 /var/www/public
RUN chmod +x start.sh
# Update the default apache site with the config we created.
ADD apache-config.conf /etc/apache2/sites-enabled/000-default.conf

# Expose port 8080
EXPOSE 8080

# Start the server
# CMD php artisan migrate; php artisan db:seed; apache2-foreground;
# CMD apache2-foreground; php artisan migrate:fresh
COPY start.sh /start.sh
CMD ["/bin/bash","/start.sh"]
