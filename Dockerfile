FROM nginx:alpine
LABEL maintainer="sayedmdabu94@gmail.com"
COPY index.html /usr/share/nginx/html
WORKDIR /apps
