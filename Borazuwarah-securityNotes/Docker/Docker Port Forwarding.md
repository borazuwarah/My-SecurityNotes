

```sh fold:"dockerfile"

FROM ubuntu:latest


MAINTAINER Pablo Ramiez "Borazuwarah"

ENV DEBIAN_FONTEND noninteractive

RUN apt update&& apt install -y net-tools\
	iputils-ping \
	curl \
	git \
	nano \
	apache2 \
	php
	
EXPOSE 80

ENTRYPOINT service apache2 start && /bin/bash

```


```sh fold:"Construir la image llamandole werbserver"
docker build -t webserver .
```


```sh fold:"Corear el contenedor"
docker run -dit -p  80:80 --name mywervServer webserver
# el puerto 80 local se convierte en el puerto 80 del contenedor


docker port myWebServer
lsoft -i:80
```