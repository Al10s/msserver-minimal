FROM php:7-apache

# Install required utils
RUN apt update && apt install -y \
    gnupg \
    apt-transport-https \
    locales

# Set timezone
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Europe/Paris /etc/localtime
RUN "date"

# Install ODBC driver
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add -
RUN curl https://packages.microsoft.com/config/debian/9/prod.list > /etc/apt/sources.list.d/mssql-release.list
RUN export DEBIAN_FRONTEND=noninteractive && apt-get update && ACCEPT_EULA=Y apt-get install -y msodbcsql17 unixodbc-dev
RUN set -xe \
    && pecl install pdo_sqlsrv \
    && docker-php-ext-enable pdo_sqlsrv \
    && apt-get purge -y unixodbc-dev && apt-get autoremove -y && apt-get clean

# Set locale to utf-8
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen
RUN locale-gen
ENV LANG='en_US.UTF-8' LANGUAGE='en_US:en' LC_ALL='en_US.UTF-8'

# Copy INI files
COPY conf/odbc/*.ini /etc/
