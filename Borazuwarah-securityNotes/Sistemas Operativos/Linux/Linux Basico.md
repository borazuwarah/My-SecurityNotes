# Comandos básicos

### Movernos entre directorios
`cd {nombre carpeta}` nos movemos a la carpeta
`cd ..` Nos movemos a la carpeta anterior
### Limpiar teminal
`Clear`
### donde estamos
`pwd`
### Listar 
`ls
`ls -l ` mas detalle
`ls -a` mostrar los ocultos (.file/directory)

### Crear un directorio
`mkdir {nombre del directorio}`
### Eliminar una carpeta
`rmdir` {nombre carpeta}
`rm -r` {nombre carpeta}

### crear archivo
`touch {nombre archivo}`
`touch {archivo con espacios}` crear archivo con espacios en el nombre
### Eliminar archivo
`rm {nombreArchivo}`
`rm {nombreArchivo} {archivo2} {archivo3}` Eliminar varios archivos
### Renombrar Archivo
`mv nombreviejo nombrenuevo`

### Cambiar ficheros de sitioi
`mv ruta fichiero nuevaRutaFichero`
`mv fichero ..` mover el archivo a la carpeta padre

### copiar ficheros
`cp fichero nuevarutaFichero`
`cp fichero nuevoNombre` también se le puede cambiar el nombre




# Instalar Aplicaciones

## Instalar aplicación que se encuentra en los repos
`apt install {nombre de apliacion}`
> ejemplo instalación audacity  --> `apt install audacity`

## Instalar aplicación que no está en los repos:
Descargamos  el fichero  .deb
una vez descargado
Instalacion
`dpkag -i {nombre de paquete.deb}`
al hacerlo de esta forma se incorparan los repos al sistema y se actualizxará en futuros updates

## desisntalar aplicacion
`apt remove {nombre de paquete}`
> ejemplo desinstalar audacity --> `apt remove audacity`

## eliminar dependencias huerfanas
`apt autoremove`
se aconseja pasarlo después de eliminar una aplicación o proceso

Actualizar los repositorios
`apt update`
actualizar nuestro sistema a la ultima version tambien las aplicaciones
`apt upgrade`

# Cat
cat sirve para ver el contenido de un fichero
Cat nombre fichero muestra el fichero 
![[Comando - Cat a fichero.png]]

cat * muestra el contenido de todos los fiheros de la ruta donde estes
![[Comando - Cat multiples ficheros.png]]




