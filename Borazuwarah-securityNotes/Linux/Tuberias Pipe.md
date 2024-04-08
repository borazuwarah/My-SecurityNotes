Pipe --> |
sirve para aplicar un comando a la salida de otro comando:

por tanto la salida de un comando será la entrada del siguiente.
Uso
```sh fold:"coamndos con tuberias pipe "
cat escritorio.txt | wc -l
# wc -l va a comntar las lineas de un archivo
```

ejemplo con grep
```sh fold:"coamndos con tuberias pipe "
cat escritorio.txt | grep saludo
# grep busca el contenido
```

```sh fold:"coamndos con tuberias pipe multiples pipes"
cat escritorio.txt | wc -l | grep saludo
# sobre la salida del cat se ejecuta wc, sobre la salida del wc se ejecuta el grep
```

Ejemplo util:

```sh fold:"ejemplo para eliminar lineas repetidas uxando pipe "
cat  text.txt | sort | uniq
# abrimos el archvo
# ordenamos el contenido
# con uniq ponemos solo las lineas diferentes
```

