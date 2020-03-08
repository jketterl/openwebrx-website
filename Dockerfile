FROM alpine:latest

ADD https://github.com/just-containers/s6-overlay/releases/download/v1.21.8.0/s6-overlay-amd64.tar.gz /tmp/
RUN tar xzf /tmp/s6-overlay-amd64.tar.gz -C /
ENTRYPOINT ["/init"]

RUN apk add --no-cache lighttpd php7-fpm php7-mbstring php7-openssl php7-simplexml php7-json php7-intl && \
    echo -e 'include "mod_fastcgi_fpm.conf"\nserver.modules += ("mod_compress", "mod_expire", "mod_setenv")\n\
        compress.filetype = ("text/plain", "text/html", "text/javascript", "text/css")\n\
        expire.mimetypes = ("text/" => "access plus 1 days")\n\
        setenv.add-response-header += ("Cache-Control" => "public, must-revalidate, max-age=86400")\n'\
    >> /etc/lighttpd/lighttpd.conf && \
    echo -e 'zlib.output_compression = On\n' > /etc/php7/conf.d/01-compression.ini
EXPOSE 80

ADD conf/php-fpm /etc/services.d/php-fpm
ADD conf/lighttpd /etc/services.d/lighttpd

RUN wget -qO - https://github.com/twbs/bootstrap/releases/download/v4.4.1/bootstrap-4.4.1-dist.zip | unzip -d /var/www/localhost/htdocs - && \
    mv /var/www/localhost/htdocs/bootstrap-4.4.1-dist /var/www/localhost/htdocs/bootstrap && \
    mkdir -p /var/www/localhost/php/aws-sdk && \
    wget -qO - https://docs.aws.amazon.com/aws-sdk-php/v3/download/aws.zip | unzip -d /var/www/localhost/php/aws-sdk - && \
    wget -qO /var/www/localhost/htdocs/bootstrap/css/bootstrap.min.css https://bootswatch.com/4/darkly/bootstrap.min.css && \
    mkdir -p /var/www/localhost/htdocs/jquery && \
    wget -qO /var/www/localhost/htdocs/jquery/jquery.min.js https://code.jquery.com/jquery-3.4.1.min.js

ADD ws/ /var/www/localhost/htdocs