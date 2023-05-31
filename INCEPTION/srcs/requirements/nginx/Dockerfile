FROM alpine:3.16

RUN apk update && \
	apk add --no-cache nginx

COPY conf/nginx.conf /etc/nginx/http.d/nginx.conf
# COPY index.html /var/www/index.html

EXPOSE 443

ENTRYPOINT ["nginx", "-g", "daemon off;"]
# COPY etc/nginx/ssl
