FROM composer:2.2 as builder

COPY composer.json /app/

RUN composer install \
  --ignore-platform-reqs \
  --no-ansi \
  --no-autoloader \
  --no-interaction \
  --no-scripts

COPY . /app/

RUN composer dump-autoload --optimize --classmap-authoritative

FROM php:5.6-cli as base

RUN  echo "deb http://archive.debian.org/debian stretch main" > /etc/apt/sources.list \
    && apt-get update \
    && apt-get install -y --no-install-recommends build-essential python git

# Cleanup
RUN rm -rf /var/lib/apt/lists/*
RUN rm -rf /tmp/pear/

# Setup working directory
WORKDIR /app

COPY --from=builder /app /app

COPY --from=builder /usr/bin/composer /usr/local/bin/composer
