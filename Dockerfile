FROM debian:latest
MAINTAINER “anton_sediuk” glowcow@gmail.com
RUN apt-get update && apt-get install -y nginx php-fpm libpq-dev php-pgsql
RUN mkdir -p /var/www/noc_web /var/run/php/
COPY www/ /var/www/noc_web
COPY nginx/noc_web.conf /etc/nginx/sites-enabled/default
COPY run.sh /root
EXPOSE 80
ENTRYPOINT ["root/run.sh"]