#FROM php:8-apache
FROM php:8.2.0-apache-bullseye
#Apache ENVs
ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_PID_FILE /var/run/apache2/apache2.pid
ENV APACHE_SERVER_NAME debian 


# installing required stuff
RUN apt-get update \
    && apt-get install -y unzip libaio-dev libmcrypt-dev git zlib1g zlib1g-dev libpng-dev libxml2-dev\
    && apt-get clean -y

# PHP extensions
RUN \
    docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-configure mysqli \
    && docker-php-ext-install pdo_mysql

# Install Postgresql PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql bcmath gd
# xdebug, if you want to debug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install soap 

# Install ZipArchive 
RUN apt-get update \
    && apt-get install -y \
    libzip-dev \
    && docker-php-ext-install zip

# PHP composer
RUN curl -sS https://getcomposer.org/installer | php --  --install-dir=/usr/bin --filename=composer

# apache configurations, mod rewrite
RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load

# Oracle instantclient

# copy oracle files
# ADD oracle/instantclient-basic-linux.x64-12.1.0.2.0.zip /tmp/
ADD https://download.oracle.com/otn_software/linux/instantclient/211000/instantclient-basic-linux.x64-21.1.0.0.0.zip /tmp/
# ADD oracle/instantclient-sdk-linux.x64-12.1.0.2.0.zip /tmp/
ADD https://download.oracle.com/otn_software/linux/instantclient/211000/instantclient-sdk-linux.x64-21.1.0.0.0.zip /tmp/
# ADD oracle/instantclient-sqlplus-linux.x64-12.1.0.2.0.zip /tmp/
ADD https://download.oracle.com/otn_software/linux/instantclient/211000/instantclient-sqlplus-linux.x64-21.1.0.0.0.zip /tmp/

# unzip them
RUN unzip /tmp/instantclient-basic-linux.x64-*.zip -d /usr/local/ \
    && unzip /tmp/instantclient-sdk-linux.x64-*.zip -d /usr/local/ \
    && unzip /tmp/instantclient-sqlplus-linux.x64-*.zip -d /usr/local/

# install oci8
RUN ln -s /usr/local/instantclient_*_1 /usr/local/instantclient \
    && ln -s /usr/local/instantclient/sqlplus /usr/bin/sqlplus 
RUN docker-php-ext-configure oci8 --with-oci8=instantclient,/usr/local/instantclient \
    && docker-php-ext-install oci8 \
    && echo /usr/local/instantclient/ > /etc/ld.so.conf.d/oracle-insantclient.conf \
    && ldconfig

# install compose
RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php \
    && HASH=`curl -sS https://composer.github.io/installer.sig` \
    && php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && ldconfig

RUN export ORACLE_HOME=/usr/local/instantclient \
    && export LD_LIBRARY_PATH=$ORACLE_HOME \
    && ldconfig 

# install pdo_oci8
ADD https://www.php.net/distributions/php-8.2.1.tar.bz2 /tmp/

RUN cd /tmp \
    && tar xvf php-8.2.1.tar.bz2  \
    && cd /tmp/php-8.2.1/ext/pdo_oci \
    && export ORACLE_HOME=/usr/local/instantclient \
    && phpize \
    && ./configure --with-pdo-oci=instantclient,/usr/local/instantclient/,11.2 \
    && make \
    && make install \
    && touch /usr/local/etc/php/conf.d/pdo_oci.ini \
    && echo extension=pdo_oci.so >> /usr/local/etc/php/conf.d/pdo_oci.ini 

# Limpando diretorio /tmp   
RUN cd /tmp \
    && rm instantclient*.zip \
    && rm -r php-8.2.1* 	

EXPOSE 80
RUN chmod -R 775 /var/www/html/
RUN chown -R www-data:www-data /var/www/html/
RUN apache2ctl start
