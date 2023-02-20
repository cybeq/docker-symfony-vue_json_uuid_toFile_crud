# Use the official PHP image as a base
FROM php:8.1-apache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get update && \
    apt-get install -y git zip unzip curl
# Install the Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash -s -- --install-dir=/usr/local/bin

# Copy the `symfony` binary to /usr/local/bin
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY / /var/www/html/
# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . .


# Install application dependencies
RUN composer install --no-interaction


# Create var/logs directory
RUN mkdir -p var/logs

# Set file permissions
RUN chown -R www-data:www-data var/cache var/logs
CMD ["symfony", "server:start"]
# Expose port 8000
EXPOSE 8000