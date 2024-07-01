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