FROM alpine:latest

RUN apk add --no-cache lighttpd
EXPOSE 80
CMD [ "/usr/sbin/lighttpd",  "-Df",  "/etc/lighttpd/lighttpd.conf" ]

ADD ws/ /var/www/localhost/htdocs