Docker file es un fichero que nos permite crear nuestras propias imagenes docker

Docker va a  constuir la imagen ejecutando lina por linea todo los que hay en el fichero Dockerfile

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

# construrir la imagen de docker

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

