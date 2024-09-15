Docker file es un fichero que nos permite crear nuestras propias imágenes docker

Docker va a  construir la imagen ejecutando linea por linea todo los que hay en el fichero Dockerfile

Nombre del archivo:Dockerfile

Contenido de ejemplo:

```sh fold:"Dockerfile"

FROM ubuntu

RUN apt update

RUN apt install python3 -y

CMD python3

# From Ubuntu -->usa la imagen como base
# Run apte update actualiza los repositorios cuando se construye la imagen
# RUN apt install python3 -y instalar python3 sin que pregunte nada en la instalacion.
# CMD python3 ejecuta python al levantar la imagen
```


otro docker file
```sh fold:"Dockerfile Ubuntu"

FROM ubuntu:latest

MAINTAINER: Pablo Ramirez "Borazuwarah"
#Maintainer es opcional

RUN apt update && apt install -y net-tools \ iputils-ping \
curl \
git \
nano
```


# construir la imagen de docker

Construir la imagen docker nos servirá para desplegarla 

docker build --tag {nombre de la image} . 

```sh fold:"construir imagen Docker"

docker build --targ {nombre de imagen} .
# no olvidar el . esto es la ruta donde está el fichero Dockerfile
```

buld está deprecado y se actualizará con buildx


para usarlo usaremos lo siguiente
instalación:
```sh fold:"Instalacion docker-buildx"
apt install docker-buildx
```

comprobar si está instalado y la version
```sh fold:"Comprobar version de DockerBuildx"
docker buidx version
```

Uso
```sh fold:"Crear una imagen con buildx"
docker buildx build --tag {nombre de la image} .
# no olvidar el . esto es la ruta donde está el fichero Dockerfile

```

Para lanzar el contenedor se hace de la misma forma
docker run -it {3 primeros caracteres de imagen Id}








## Ejercicio Practico crear una imagen de Kali con algunas herramientas de Pentesting


Imagen de Kali en DockerHub: [kalilinux/kali-rolling - Docker Image | Docker Hub](https://hub.docker.com/r/kalilinux/kali-rolling)
```sh fold:"Ejercicio Practico Dockerfile"

FROM Kalilinux/kali-rolling

RUN apt update && apt install nmap hydra -y

```



# Instrucciones FROM, RUN y COPY (fichero Dockerfile)
## FROM (docker)
Es la instrucción para asignar la base del sistema
ejemplos:

FROM ubuntu

## RUN (docker)

Es la instrucción para ejecutar comandos a la hora de arrancar nuestra imagen
ejemplos:

RUN apt update && apt upgrade -y


## COPY

Es la instruccion que nos sirve para copiar archivos dentro del contenedor
ejemplos:

COPY prueba.txt  /home/ --> va a coppiar  el fichero prueba.txt dentro del fichero /home/

# Instrucciones ENV, LABEL y USER (fichero Dockerfile)

## Env
Sirve para declarar variables de entorno dentro de una variable

ejemplo:
From Ubuntu
ENV VARIABLE="Soy un dato en una variable de entorno"

CMD echo $VARIABLE

# LABEL
sirve para generar metadatos dentro de la imagen


ejemplo:
LALBEL author="Pablo"
LABEL version="1.0"
LABEL descripcion="Descripcion de la imagen de Docker"


Para comprobar los metadatos se puede usar el siguiente coimando :
despues de hacer :
docker run -it  {imageId}
docker inspect {imageId}

## USER
Insturcciones para crear grupos y/o grupos

Despues del ponmer el USER {usuario}
topdos los comandos que se ejecuten despues  serán con el usuario nuevo.

ejemplos:
RUN adduser pablo
RUN addgroup grupoTrabajo
RUN usermod -aG grupoTrabajo pablo

USER pablo
CMD whami (pablo)


## Dockerizando una aplicacion Python
en python creamos una calculadora y la vamos a dockerizar.

Imaginando que ya tenemos: la calculadora en el ficheor calculadora.py

cremaos un Dockerfile


FROM ubuntu
RUN apt update && apt install python3 -y 

WORKDIR /home
COPY calculadora.py /home/

CMD pyhon3 calculadora.py

# Cambiar el nombre al fichero Dockerfile
también se puede crear un build con un fichero que no se llame Dockerfile
por defecto docker busca ese nombre de fichero

para ello lo que tenemos que hacer es lo siguiente
docker builx  --tag XXX -f {nombre del fichero} .

```sh fold:"Crear un contenedo rocn un fichoero con nombre diferente a Dockerfile"

docker builx  --tag XXX -f {nombre del fichero} .
```

