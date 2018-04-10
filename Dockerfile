FROM php:cli

MAINTAINER Ivan Barlog <ivan.barlog@everlution.sk>

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN apt-get update && apt-get install -y --no-install-recommends \
    libcurl4-openssl-dev \
    curl \
    git \
    zlib1g-dev \
    vim

RUN docker-php-ext-install zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

VOLUME ["/app"]
WORKDIR /app

CMD ["php", "-a"]
