
https://www.youtube.com/watch?v=ginzuvA22Nw

explotando los binarios
https://gtfobins.github.io/

primero sudo -l
con este comando podemos ver que programas podemos ejecutar con  permisos elevados

```sh fold:"Revisar tenemos permiso de algun programa como root"
sudo -l
```
si se encuentra algún software que se pueda explotar lo revisamos en la web grfobins




Revisar si tenemos permiso de escritura en /etc/passwd:

```sh fold:"Revisar si tenemos permiso de escritura en /etc/passwd"
find / -writable -type f 2>/dev/null |grep '/etc/passwd' && ls -lah /etc/passwd
```

## Binarios SUID
si sudo -l no funciona 
se puede revisar coon
find / -perm -4000 2>/dev/null
tenemos que identificar si hay algun binario estraño que no debería estar ahí
se pueden comprobar uno a uno en gtfobbins y si alguno está disponible con SUID

guardamos todo lo que encontremos si son muchos comandos en un fichero sh le damos permisos y lo ejecutamos
IMPORTANTE, siempre poner el binario con la ruta completa en gtfobins viene con la ruta absoluta
/bin/systemctl o donde proceda

cuidado con los comandos de SUID en gtfobins que empiezna por . para ejecutarlos lo que tenemos que hacer es 

ese punto sería correcto si estubieramos en la ruta correcta  /usr/bin/ o el que proceda..
entonces quitamos el . y la / y listo

## Binarios SUID

```sh fold:"Revisar binarios que se puedan explotar"
find  / -perm -4000 2>/dev/null  
```

# conocer  versión de Linux y distribución

```sh fold:"conocer version de linux"
lsb_release -a
```

Búsqueda en google
exploit  {distribución}  {version}
Descargamos el exploit

enviamos el exploit a la maquina victima


# compilar archivos en c
gcc -o {archivo resultante} {archivo fuente en C}