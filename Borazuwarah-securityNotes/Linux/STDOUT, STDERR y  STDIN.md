Flujos para iormas de interactuar entre los programas

## Stdout
Standoar output, es la salida estandard de un comando
Es la ejecucion normal de un comando


## stderr
Basicamente son errores que salen cuando se ejecuta un comnando por ejemplo (find / x--> permiso denegado)
Es el estandar de error
Orden no encontrada --> Estandar Error (STDERR)
redireccion del estandar error a /dev/null
2>/dev/null

enviar todo a error
>/dev/null

Enviar todo el trafico a un fichero 
echo ´hola´ > log.txt --> la entrada de hola se redirige al fichero log,txt

## Stdin
es la entrada estandar al introducir un dato en el sistema
```sh fold:"Pregunta por el nombre, y la entrada del nombre seria la entrada del dato"
read -p 'introduce tu nombre'
```