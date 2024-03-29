FROM alpine:latest

ADD https://github.com/just-containers/s6-overlay/releases/download/v3.1.5.0/s6-overlay-noarch.tar.xz /tmp
RUN tar -Jxpf /tmp/s6-overlay-noarch.tar.xz -C /
ADD https://github.com/just-containers/s6-overlay/releases/download/v3.1.5.0/s6-overlay-x86_64.tar.xz /tmp
RUN tar -Jxpf /tmp/s6-overlay-x86_64.tar.xz -C /
ENTRYPOINT ["/init"]

RUN apk add --no-cache lighttpd php82-fpm php82-mbstring php82-openssl php82-simplexml php82-json php82-intl
EXPOSE 80

RUN wget -qO - https://github.com/twbs/bootstrap/releases/download/v4.4.1/bootstrap-4.4.1-dist.zip | unzip -d /var/www/localhost/htdocs - && \
    mv /var/www/localhost/htdocs/bootstrap-4.4.1-dist /var/www/localhost/htdocs/bootstrap && \
    mkdir -p /var/www/localhost/php/aws-sdk && \
    wget -qO - https://docs.aws.amazon.com/aws-sdk-php/v3/download/aws.zip | unzip -d /var/www/localhost/php/aws-sdk - && \
    wget -qO /var/www/localhost/htdocs/bootstrap/css/bootstrap.min.css https://bootswatch.com/4/darkly/bootstrap.min.css && \
    mkdir -p /var/www/localhost/htdocs/jquery && \
    wget -qO /var/www/localhost/htdocs/jquery/jquery.min.js https://code.jquery.com/jquery-3.5.1.min.js

ADD conf/php-fpm /etc/services.d/php-fpm
ADD conf/lighttpd /etc/services.d/lighttpd

RUN echo -e 'include "mod_fastcgi_fpm.conf"\nserver.modules += ("mod_deflate", "mod_expire", "mod_setenv")\n\
        deflate.mimetypes = ("text/plain", "text/html", "text/javascript", "text/css", "image/svg+xml")\n\
        deflate.allowed-encodings = ("brotli", "gzip", "deflate")\n\
        expire.mimetypes = ("text/" => "access plus 1 days")\n\
        setenv.add-response-header += ("Cache-Control" => "public, must-revalidate, max-age=86400", "Content-Language" => "en")\n\
        mimetype.assign += (".webp" => "image/webp")\n\
        server.tag = ""\n\
        server.errorlog := ""\n'\
    >> /etc/lighttpd/lighttpd.conf && \
    echo -e 'zlib.output_compression = On\n' > /etc/php82/conf.d/01-compression.ini && \
    echo -e 'expose_php = Off\n' > /etc/php82/conf.d/02-disable-powered-by.ini && \
    echo -e 'clear_env = no\n' >> /etc/php82/php-fpm.d/www.conf

ADD ws/ /var/www/localhost/htdocs