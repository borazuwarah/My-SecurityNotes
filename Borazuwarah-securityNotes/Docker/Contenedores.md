Que es un contenedor

## Crear contenedor

```sh fold:"Docker lanzar un contenedor"
docker run

# Lanzar un contendor
```

```sh fold:"Docker ps"
docker ps
# lista contenedores levantados
```

```sh fold:"docker ps -a"
docker ps -a
# lista todos contenedores detenidos
```

## Iniciar contenedor
```sh fold:"Docker iniciar contendir"
docker run -it {2 primeros caracteres de la ID de la imagen}
# la id de la imagen se ve con docker images
docker run -dit --name myContainer {imagen}
#-d para dejar en 2 plano el contenedor
#-i interactivo, poder conectar con una consola
# -t juntar todos los aprametros
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
# solo se pueden eliminar los que están parados o poner el --force para obligarlo a que lo elimine


# eliminar todos los contenedores anidadndo comandos de docker
docker rm  $(docker ps -a -q)
# con el -q  se queda con el identificador del contenedor
docker rm  $(docker ps -a -q) --force # para forzar a eliminarlos aunk estén correindo
```

## Entrar en un contenedor
Para entrar en un contenedor que está en estado UP (levantado)
```sh fold:"docker, Entrar contendodr"
docker attach {containerId}
```

## Salir del contenedor (dejando en ejecución)


atajo de teclado
```sh fold:"docker salir de un contenedor dejandolo ene ejecucion"
CTRL + p
CTRL +q

# ahora el contenedor aparecerá en docker ps
```




El comando “**docker run**” se utiliza para crear y arrancar un contenedor a partir de una imagen. Algunas de las opciones más comunes para el comando “docker run” son:

- “**-d**” o “**–detach**“: se utiliza para arrancar el contenedor en segundo plano, en lugar de en primer plano.
- “**-i**” o “**–interactive**“: se utiliza para permitir la entrada interactiva al contenedor.
- “**-t**” o “**–tty**“: se utiliza para asignar un seudoterminal al contenedor.
- “**–name**“: se utiliza para asignar un nombre al contenedor.

Para arrancar un contenedor a partir de una imagen, se utiliza el siguiente comando:

➜ `docker run [opciones] nombre_de_la_imagen`

Por ejemplo, si se desea arrancar un contenedor a partir de la imagen “**mi_imagen**“, en segundo plano y con un seudoterminal asignado, se puede utilizar la siguiente sintaxis:

➜  `docker run -dit mi_imagen`

Una vez que el contenedor está en ejecución, se puede utilizar el comando “**docker ps**” para listar los contenedores que están en ejecución en el sistema. Algunas de las opciones más comunes son:

- “**-a**” o “**–all**“: se utiliza para listar todos los contenedores, incluyendo los contenedores detenidos.
- “**-q**” o “**–quiet**“: se utiliza para mostrar sólo los identificadores numéricos de los contenedores.

Por ejemplo, si se desea listar todos los contenedores que están en ejecución en el sistema, se puede utilizar la siguiente sintaxis:

➜  `docker ps -a`

Para ejecutar comandos en un contenedor que ya está en ejecución, se utiliza el comando “**docker exec**” con diferentes opciones. Algunas de las opciones más comunes son:

- “**-i**” o “**–interactive**“: se utiliza para permitir la entrada interactiva al contenedor.
- “**-t**” o “**–tty**“: se utiliza para asignar un seudoterminal al contenedor.

Por ejemplo, si se desea ejecutar el comando “**bash**” en el contenedor con el identificador “**123456789**“, se puede utilizar la siguiente sintaxis:

➜ `docker exec -it 123456789 bash`