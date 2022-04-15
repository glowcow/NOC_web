FROM debian:11.3-slim
ENV NGINX_VER=1.18.0-6.1 PHPFPM_VER=2:7.4+76 LPQ_VER=13.5-0+deb11u1 
RUN apt-get update && \
    apt-get install -y nginx=$NGINX_VER php-fpm=$PHPFPM_VER libpq-dev=$LPQ_VER php-pgsql=$PHPFPM_VER && \
    rm -rf /var/lib/apt/lists/* && \
    echo "clear_env = no" >> /etc/php/7.4/fpm/pool.d/www.conf
RUN mkdir -p /var/www/noc_web /var/run/php
COPY www /var/www/noc_web
COPY nginx/noc_web.conf /etc/nginx/sites-enabled/default
COPY docker-entrypoint.sh /
EXPOSE 80
ENTRYPOINT ["/docker-entrypoint.sh"]
