FROM php:8.4-cli

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libsqlite3-dev libonig-dev libxml2-dev curl \
    && docker-php-ext-install zip pdo pdo_sqlite mbstring bcmath \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app
COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN cp .env.example .env || true
RUN touch database/database.sqlite
RUN chmod -R 777 storage bootstrap/cache database

EXPOSE 8000

CMD php artisan key:generate --force && \
    php artisan migrate --force && \
    php artisan db:seed --class=DemoSeeder --force && \
    php artisan serve --host 0.0.0.0 --port $PORT
