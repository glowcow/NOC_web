FROM debian:11.3-slim
RUN apt-get update && \
    apt-get install -y nginx=1.18.0-6.1 php-fpm=2:7.4+76 libpq-dev=13.5-0+deb11u1 php-pgsql=2:7.4+76 && \
    rm -rf /var/lib/apt/lists/* && \
    echo "clear_env = no" >> /etc/php/7.4/fpm/pool.d/www.conf
RUN mkdir -p /var/www/noc_web /var/run/php
COPY www /var/www/noc_web
COPY nginx/noc_web.conf /etc/nginx/sites-enabled/default
COPY docker-entrypoint.sh /
EXPOSE 80
ENTRYPOINT ["/docker-entrypoint.sh"]
