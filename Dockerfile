FROM alpine:latest

ADD https://github.com/just-containers/s6-overlay/releases/download/v1.21.8.0/s6-overlay-amd64.tar.gz /tmp/
RUN tar xzf /tmp/s6-overlay-amd64.tar.gz -C /
ENTRYPOINT ["/init"]

ADD conf/php-fpm /etc/services.d/php-fpm
ADD conf/lighttpd /etc/services.d/lighttpd

RUN apk add --no-cache lighttpd php7-fpm && \
    echo -e 'include "mod_fastcgi_fpm.conf"\n' >> /etc/lighttpd/lighttpd.conf
EXPOSE 80

RUN wget -O - https://github.com/twbs/bootstrap/releases/download/v4.3.1/bootstrap-4.3.1-dist.zip | unzip -d /var/www/localhost/htdocs - && \
    mv /var/www/localhost/htdocs/bootstrap-4.3.1-dist /var/www/localhost/htdocs/bootstrap && \
    mkdir -p /var/www/localhost/htdocs/jquery && \
    wget -O /var/www/localhost/htdocs/jquery/jquery.min.js https://code.jquery.com/jquery-3.4.1.min.js

ADD ws/ /var/www/localhost/htdocs