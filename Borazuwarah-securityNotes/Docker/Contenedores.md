Que es un contenedor

## Crear contenedor

```sh fold:"Docker lanzar un contenedor"


# Lanzar un contendor
```

```sh fold:"Docker ps"
docker ps
# lista contenedores levantados
```

```sh fold:"docker ps -a"
docker ps -a
# lista contenedores detenidos
```

## Iniciar contenedor
```sh fold:"Docker iniciar contendir"
docker run -it {2 primeros caracteres de la ID de la imagen}
# la id de la imagen se ve con docker images
```

## Detener contenedor

Para detener un contenedor 
Desde dentro del contenedor ejecutamos exit y ya aparece como detenido y aparecerá en 
docker ps -a

```sh fold:"docker, detener  contendodr"
docker stop {identificador  del contendiro}
```


## Reanudar contenedor

para reanudar un contenedor
```sh fold:"docker, reanudar contendodr"
docker start {identificador  del contendiro}
```
## Reiniciar contenedor

```sh fold:"docker, reiniciar contendodr"

docker restart {identificador  del contenedor}
```



# Eliminar contenedor
```sh fold:"docker, eliminar contendodr"

docker rm {identificador  del contenedor}
```

## Entrar en un contenedor
Para entrar en un contenddor que está en estado UP (levantado)
```sh fold:"docker, Entrar contendodr"

docker attacht {containerId}
```

## Salir del contenedor (dejandolo en ejecucion


atajo de teclado
```sh fold:"docker salir de un contenedor dejandolo ene ejecucion"
CTRL + p
CTRL +q

# ahora el contenedor aparecerá en docker ps
```