FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libsqlite3-dev libonig-dev libxml2-dev curl \
    && docker-php-ext-install zip pdo pdo_sqlite mbstring bcmath \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

# Sterge orice .env copiat (folosim DOAR variabilele din Render)
RUN rm -f .env
RUN touch database/database.sqlite
RUN chmod -R 777 storage bootstrap/cache database

EXPOSE 8000

# Curatam orice cache de config inainte de pornire, apoi pornim
CMD php artisan config:clear && \
    php artisan cache:clear || true && \
    php artisan migrate --force && \
    php artisan db:seed --class=DemoSeeder --force && \
    php artisan serve --host 0.0.0.0 --port $PORT
