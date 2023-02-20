# Use the official PHP image as a base
FROM php:8.1-apache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get update && \
    apt-get install -y git zip unzip curl nodejs npm
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

# Build Vue application
RUN cd ./vue && \
    npm install && \
    npm run build && \
    cd ../

# Move built files to their respective locations
RUN mkdir -p ./templates/vue/ && \
    mkdir -p ./public/css/ && \
    mkdir -p ./public/js/ && \
    mv ./vue/dist/index.html ./templates/vue/ && \
    mv ./vue/dist/css/* ./public/css/ && \
    mv ./vue/dist/js/* ./public/js/ && \
    mv ./vue/dist/favicon.ico ./public/

# Create var/logs directory
RUN mkdir -p var/logs

# Set file permissions
RUN chown -R www-data:www-data var/cache var/logs
CMD ["symfony", "server:start"]
# Expose port 8000
EXPOSE 8000