comando para descargar 
por ejemplo, podemos descargar el archivo de un repositorio git ejemplo:

```sh fold:"coamndo wget"
wget ruta/publica/al/archivo
```

con -O podemos cambiar el nombre al archivo

```sh fold:"coamndo wget parametro -O"
wget -O nombrenuevofichero.extension ruta/publica/al/archivo
```

Descargar un archivo y cambiarle el nombre
```sh fold:"coamndo wget parametro descargar varios ficheros a la vez "
wget  ruta/publica/al/archivo1 ruta/publica/al/archivo1
```

Descargar todos los archivos de una ruta
```sh fold:"coamndo wget parametro descargar  todos los archivos del servidor"
wget  -r ruta/publica/al/path

# r descarga recursiva
```