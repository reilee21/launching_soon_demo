# Stage 1: Build dependencies using Composer
FROM composer:2.7 AS vendor

WORKDIR /app
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-progress --prefer-dist --optimize-autoloader

# Stage 2: Final image with PHP-FPM + Nginx
FROM php:8.3-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    nginx \
    bash \
    curl \
    zip \
    unzip \
    git \
    supervisor \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    oniguruma-dev \
    libxml2-dev \
    postgresql-dev

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd

# Set working directory
WORKDIR /var/www/html

# Copy source code
COPY . .

# Copy vendor from builder stage
COPY --from=vendor /app/vendor ./vendor

# Copy Nginx & Supervisor configs
COPY ./docker/nginx.conf /etc/nginx/http.d/default.conf
COPY ./docker/supervisord.conf /etc/supervisord.conf

# Permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port
EXPOSE 8080

# Start Supervisor to run PHP-FPM + Nginx
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
