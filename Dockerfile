FROM php:8.3-cli

# Instalare extensii PHP necesare
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libsqlite3-dev \
    && docker-php-ext-install zip pdo pdo_sqlite

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

# Instalare dependinte PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Pregatire aplicatie
RUN cp .env.example .env || true
RUN php artisan key:generate --force
RUN touch database/database.sqlite

EXPOSE 8000

# Comanda de pornire: migrari + seed + server
CMD php artisan migrate --force && \
    php artisan db:seed --class=DemoSeeder --force && \
    php artisan serve --host 0.0.0.0 --port $PORT
