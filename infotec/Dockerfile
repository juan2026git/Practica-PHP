FROM php:8.4-apache

# Dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl

# Extensiones PHP
RUN docker-php-ext-install pdo pdo_mysql

# Activar rewrite (IMPORTANTE para Laravel)
RUN a2enmod rewrite

# Cambiar DocumentRoot a /public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Permisos Apache para Laravel
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/c\
<Directory /var/www/html/public>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' /etc/apache2/apache2.conf