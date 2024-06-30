

Una imagen es un instalador donde  podemos correr nuestras aplicaciones con todas las dependencias que necesite del sistema

las imagenes instaladas las podemos ver con  docker images
Las imagenes son el sistema Base que se va a usar para instalar nuestras aplicaciones

```sh fold:"Docker - ver las imagenes instaladas"
docker images
```


Imagenes de maquinas dockerizadas
web: [Docker Hub Container Image Library | App Containerization](https://hub.docker.com/)


Descargar una imagen: 
docker pull {nombre de la imagen}

# contenedor
es un despliegue de una imagen 
docker run -it {img-ID}


docker ps
muestra informacion de los contenedores en ejecucion
docker ps -a
muestra informacion de todos los contenedores

eliminar un contenedor:
docker rm {container ID}

eliminar la imagen docker rmi {image ID}


