FROM php:7.4.9-fpm

# PHPの設定をコピー
COPY php.ini /usr/local/etc/php/

# 必要なツールとPHPの拡張をインストール
RUN apt update \
  && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip libpng-dev libjpeg-dev libfreetype6-dev \
  && docker-php-ext-install pdo_mysql zip \
  && docker-php-ext-configure gd --with-jpeg --with-freetype \
  && docker-php-ext-install gd

# Composerのインストール
RUN curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
  && composer self-update

# Node.jsとNPMをインストール
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash - \
  && apt install -y nodejs

WORKDIR /var/www