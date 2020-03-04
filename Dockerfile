FROM alpine:latest

RUN apk add --no-cache lighttpd
EXPOSE 80
CMD [ "/usr/sbin/lighttpd",  "-Df",  "/etc/lighttpd/lighttpd.conf" ]

RUN wget -O - https://github.com/twbs/bootstrap/releases/download/v4.3.1/bootstrap-4.3.1-dist.zip | unzip -d /var/www/localhost/htdocs - && \
    mv /var/www/localhost/htdocs/bootstrap-4.3.1-dist /var/www/localhost/htdocs/bootstrap

ADD ws/ /var/www/localhost/htdocs