## zip
nos permite comprimir archivos
```sh fold:"comprimir todos los archivos que terminen en mp4 en la ruta en la que estoy en un fichero"
zip -r {nombreNuevoFichero.zip} *.mp4
```

comprimir todos los archivos que tengan la extension .jpg
```sh fold:"comprimir todos los archivos que terminen en jpg en la ruta en la que estoy en un fichero"
zip -r {nombreNuevoFichero.zip} *.jpg
```

comprimir todos los archivos de una ruta
```sh fold:"comprimir todos los archivos de una ruta"
ziop -r {nombreficheronuevo.zip} *
```


## unzip
nos permite descomprimir ficheros zip

extraer  el contenido de un fichero .zip
```sh fold:"Descomprimir un archivo zip"
unzip {nombreDelArchivoZip}
```

## Tar