FROM registry-gitlab.elt-poisk.com/docker/php7/php7.4-pg:master

RUN apk add libxml2-dev
RUN apk add git
RUN docker-php-ext-install soap

RUN apk add --no-cache --repository http://dl-cdn.alpinelinux.org/alpine/edge/community/ --allow-untrusted gnu-libiconv
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php
