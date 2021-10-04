FROM ubuntu:20.04

ARG DEBIAN_FRONTEND=noninteractive

RUN apt-get update && \
    apt-get install --no-install-recommends -y \
        unzip \
        curl \
        php-fpm \
        php-apcu \
        php-ctype \
        php-curl \
        php-dom \
        php-fileinfo \
        php-ftp \
        php-iconv \
        php-gd \
        php-json \
        php-mbstring \
        php-mysql \
        php-mysqli \
        php-mysqlnd \
        php-pdo \
        php-pear \
        php-phar \
        php-posix \
        php-simplexml \
        php-soap \
        php-tokenizer \
        php-xml \
        php-xmlreader \
        php-xmlwriter \
        php-zip \
        php-xdebug \
        php-sqlite3 \
        php-redis \
        vim \
        wget \
        openjdk-8-jdk \
        ant \
        git \
        ssh \
        telnet \
        gnupg2

RUN echo 'deb http://s3-eu-west-1.amazonaws.com/tideways/packages debian main' > /etc/apt/sources.list.d/tideways.list && \
    wget -qO - https://s3-eu-west-1.amazonaws.com/tideways/packages/EEB5E8F4.gpg | apt-key add - && \
    apt-get update && \
    apt-get install --no-install-recommends -y \
    tideways-php

# Tidy up
RUN apt-get -y autoremove && apt-get clean && apt-get autoclean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# timezone
ENV TZ=Europe/Berlin
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# FIX permission for PHP
RUN usermod -u 1000 www-data

RUN service php7.4-fpm start

COPY php-fpm.conf /etc/php/7.4/fpm/pool.d/www.conf

COPY usr/local/bin/xdebug /usr/local/bin
COPY usr/local/bin/tideways /usr/local/bin
COPY usr/local/bin/install-composer.sh /usr/local/bin

RUN chmod +x usr/local/bin/xdebug
RUN chmod +x usr/local/bin/tideways
RUN chmod +x usr/local/bin/install-composer.sh

RUN /usr/local/bin/install-composer.sh

COPY etc/php/mods-available/xdebug.ini /etc/php/7.4/mods-available/xdebug.ini
COPY etc/php/mods-available/apcu.ini /etc/php/7.4/mods-available/apcu.ini
COPY etc/php/mods-available/tideways.ini /etc/php/7.4/mods-available/tideways.ini
COPY etc/php/php.override.ini /etc/php/7.4/fpm/conf.d/php.override.ini
COPY root/.bashrc /root/.bashrc
COPY root/.bash_aliases /root/.bash_aliases

RUN if [ -f "etc/hosts" ] ; then cat etc/hosts > /etc/hosts ; fi

WORKDIR /var/www
RUN ln -s /var/data data

CMD ["/usr/sbin/php-fpm7.4"]