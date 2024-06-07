
Vamos a crear una maquina en Docker en la que un servicio va a estar corriendo por el puerto 999


## crear la imagen del sistema ubuntu en su ultima version

docker pull ubuntu:latest

comprobar las imagenes de docker:
```sh title:"Comprobar las imagenes de docker"
 docker images
```

## Crear contenedor (de una imagen) y acceder
```sh title:"Crear contenedor de una imagen"
 docker run -it {3 primeras letras del IMAGE ID}
 # El image ID se peude ver con docker iamges
```

### Ver la IP del contenedor
```sh title:"Ver IP del contenedor"
 hostname -I
 # default 172.17.0.2
```
## Actualizar actualizaciones
```sh title:"Instalar apache"
 apt update
```
## Instalamos apache
```sh title:"Instalar apache"
 apt install apache2
```

corremos el servicio
service apache2 start
da error:



instalamos nano

apt insstall nanao

Agregar
en el fichero:  
```sh title:"Update apache2conf to add serverName"
ServerName 127.0.0.1
# nano /etc/httpd/conf/httpd.conf
```


Update root passord. GallinaHuevo

creamos el usuario gallineta
adduser gallineta: HuevoGallina

instalamos ssh
apt install openssh-server

