FROM php:7.3-fpm
COPY php.ini /usr/local/etc/php/

RUN apt-get update \
  && apt-get install -y zlib1g-dev libzip-dev mariadb-client \
  git \
  && docker-php-ext-install zip pdo_mysql

#Composer install
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === 'c5b9b6d368201a9db6f74e2611495f369991b72d9c8cbd3ffbc63edff210eb73d46ffbfce88669ad33695ef77dc76976') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
# rootでのcomposerコマンド実行を許可
ENV COMPOSER_ALLOW_SUPERUSER 1
# composerのグローバルパッケージがインストールされるディレクトリの指定
ENV COMPOSER_HOME /composer
# composerのパスを通す
ENV PATH $PATH:/composer/vendor/bin
# laravelインストール
RUN composer global require "laravel/installer"

RUN curl -SL https://deb.nodesource.com/setup_13.x | bash
RUN apt-get install -y nodejs && \
  npm install -g npm@latest && \
  npm install -g @vue/cli

WORKDIR /var/www
