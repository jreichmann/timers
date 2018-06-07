FROM docker.jcg.re/base-php

RUN	apk add \
		php7-json \
		php7-pdo \
		php7-pdo_sqlite \
		sqlite \
		git

ADD	webRoot/ /var/www

RUN	cd /var/www/databases/fromGit && git clone https://github.com/jreichmann/kitinfo-timers-data.git .

ADD	Caddyfile /etc/Caddyfile

ADD	periodic/ /etc/periodic

EXPOSE	80
