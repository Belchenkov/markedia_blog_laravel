FROM php:7.3

RUN apt-get update -y && apt-get install -y openssl zip unzip git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install mbstring pdo pdo_mysql

WORKDIR /app
COPY . .
RUN composer install

CMD php artisan serve --host=0.0.0.0
EXPOSE 8003
