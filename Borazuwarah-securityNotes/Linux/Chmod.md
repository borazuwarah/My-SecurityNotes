Con este comando podemos controlar los permisos de un fichero
con ls -l podemos ver los permisos de un fichoer

## gestion de permisos con letras
Leer los permisos
RWX
Usuario Grupos Otros
Propietario
d.../.../... Directorio
-.../.../... Fichero
Usuario actual / Permisos grupos/ Otros
primera letra de los permisos
	> d --> aparece si es un directorio
	> - --> aparece si es un fichero
## dar permiso de ejecucion

```sh fold:"Dar permisos de ejecucion a un fichero"
chmod +x {nombre del fichoer}
```


quitar permiso de lectura a un fichero
```sh fold:"quitar permiso de lectura a un fichero"
chmod -r {nombre del fichoer}
```

```sh fold:"dar permiso de escritura a un fichero"
chmod +w {nombre del fichoer}
```

## Gestion de permisos con numeros

numeros : 3 digitos del 1 al 7
Lectura Escritura Ejecucion = 7

4 representa todos los permisos de lectura
2 representa todos los permisos de escritura
1 representa todos los permisos de ejecución

```sh fold:"quitar todos los permisos"
sudo chmod 000 {carpeta / directorio}
```

Ejemplos:
```sh fold:"Dar permisos de lectura de un fichero al usuario actual"
sudo chmod 400 {carpeta / directorio}
```

```sh fold:"Dar permisos de lectura y escritura de un fichero al usuario actual"
sudo chmod 600 {carpeta / directorio}
```

```sh fold:"Dar permisos de lectura, escritura y ejecucion de un fichero al usuario actual"
sudo chmod 700 {carpeta / directorio}
```

```sh fold:"Dar permisos de lectura y ejecucion de un fichero al usuario actual"
sudo chmod 500 {carpeta / directorio}
```


```sh fold:"Dar permisos de lectura, escritura y ejecucion de un fichero al usuario actual y escritura para el grupo"
sudo chmod 720 {carpeta / directorio}
```

```sh fold:"Dar permisos de lectura, escritura y ejecucion de un fichero al usuario actual y escritura y lectura para el grupo"
sudo chmod 730 {carpeta / directorio}
```

```sh fold:"Dar permisos de lectura, escritura y ejecucion de un fichero al usuario actual y escritura para el grupo y para otros escritura"
sudo chmod 732 {carpeta / directorio}
```

