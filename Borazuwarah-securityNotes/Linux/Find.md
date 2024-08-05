sirve para poder hacer búsquedas de ficheros, carpetas...

```sh fold:"encontrar dentro de mi ubicacion un archivo que se llame prueba.txt"
find . -name prueba.txt
```

Buscar en la carpeta superior
```sh fold:"encontrar en mi ubicacion anterior un archivo que se llame prueba.txt"
find .. -name prueba.txt

# con .. representa el escritorio anterior
```

Buscar desde la raiz un fichero que se llame prueba.txt
```sh fold:"Encontrar dentro de/ un archivo que se llame prueba.txt"
find / -name prueba.txt
```



Buscar desde la raiz un fichero que se llame prueba.txt quitando la salida de errores
```sh fold:"Encontrar dentro de/ un archivo que se llame prueba.txt, sin que muestre errores por permisos"
find / -name prueba.txt 2>/dev/null
```

Buscar entre carpetas y archivos
```sh fold:"Encontrar todos los ficheros de la ruta actual"
find . -type f
```

```sh fold:"Encontrar todas las carpetas de la ruta actual"
find . -type d
```

