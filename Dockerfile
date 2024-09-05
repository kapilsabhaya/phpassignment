# Use an official PHP image with CLI and Composer pre-installed
FROM php:8.2-cli

# Set working directory in the container
WORKDIR /app

# Install git, zip, and unzip, and any other dependencies needed
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files to the container
COPY . /app

# Install dependencies using Composer
RUN composer install --prefer-dist --no-scripts --no-interaction

# Ensure proper permissions for the composer cache (optional)
RUN chown -R www-data:www-data /app

# Run PHPUnit and PHPStan as default commands for testing
CMD ["phpunit"]