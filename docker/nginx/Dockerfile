FROM nginx:1.17-alpine

RUN adduser -u 1000 -D -S -G nginx nginx

COPY ./docker/nginx/config/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/nginx/config/default.conf /etc/nginx/conf.d/default.conf
RUN chown -R nginx nginx /var/www/html
