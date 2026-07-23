FROM node:22-alpine AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY . .
RUN npm run build

FROM composer:2 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install \
	--no-dev \
	--no-interaction \
	--no-progress \
	--prefer-dist \
	--optimize-autoloader \
	--no-scripts

FROM php:8.4-apache

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

RUN apt-get update \
	&& apt-get install -y --no-install-recommends \
		libfreetype6-dev \
		libicu-dev \
		libjpeg62-turbo-dev \
		default-libmysqlclient-dev \
		libonig-dev \
		libpng-dev \
		libsqlite3-dev \
		libxml2-dev \
		libzip-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j"$(nproc)" \
		bcmath \
		exif \
		gd \
		intl \
		mbstring \
		pdo_mysql \
		pdo_sqlite \
		zip \
	&& a2enmod rewrite \
	&& sed -ri "s!/var/www/html!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/sites-available/000-default.conf \
	&& sed -ri "s!/var/www/!${APACHE_DOCUMENT_ROOT}!g" /etc/apache2/apache2.conf \
	&& apt-get purge -y --auto-remove \
		libfreetype6-dev \
		libicu-dev \
		libjpeg62-turbo-dev \
		default-libmysqlclient-dev \
		libonig-dev \
		libpng-dev \
		libsqlite3-dev \
		libxml2-dev \
		libzip-dev \
	&& rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --from=vendor /app/vendor ./vendor
COPY --from=frontend /app/public/build ./public/build
COPY . .

RUN mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views bootstrap/cache \
	&& chown -R www-data:www-data storage bootstrap/cache \
	&& chmod -R ug+rwx storage bootstrap/cache

EXPOSE 80

CMD ["sh", "-c", "PORT=${PORT:-80}; sed -ri \"s/Listen 80/Listen $PORT/; s/\\*:80/\\*:$PORT/\" /etc/apache2/ports.conf /etc/apache2/sites-available/000-default.conf; exec apache2-foreground"]
