En Linux


Antes de la instalación se recomienda  hacer:
Actualizar los repositorios

```sh fold:"Actualizar repositorios"
sudo apt update
```

 ## Instalación de Docker en linux
```sh fold:"Instalar Docker en Linux"
sudo apt install docker.io

sudo apt install docker.io -y
# -y para que diga que si a cualquier solicitud en la instalacion
```


## Servicio

Docker funciona con un servicio
```sh fold:"Servicio de Docker"
service docker start
```



Comprobar que está instalad
```sh fold:"Docker, comprobar instalacion
usdo docker images
# con la salida de este comando info de docker
```