FROM php:8.1-apache

# 1. Atualiza lista de pacotes e instala as dependências do PostgreSQL
RUN apt-get update \
    && apt-get install -y --no-install-recommends libpq-dev \
    && rm -rf /var/lib/apt/lists/*

# 2. Compila e habilita a extensão PDO_PGSQL
RUN docker-php-ext-install pdo_pgsql
RUN sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

COPY public/ /var/www/html/public
# 3. Copia o código-fonte para dentro do container
COPY public/ /var/www/html/public
COPY src/    /var/www/html/src