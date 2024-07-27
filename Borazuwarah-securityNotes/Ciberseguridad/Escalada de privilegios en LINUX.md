
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


## Binarios

```sh fold:"Revisar binarios que se puedan explotar"
find  / -perm -4000 2>/dev/null  
```

# conocer  versión de Linux y distribución

```sh fold:"conocer version de linux"
lsb_release -a
```

Búsqueda en google
exploit  {distibucion}  {version}
Descargamos el exploit

enviamos el exploit a la maquina victima


# compilar archivos en c
gcc -o {archivo resultante} {archivo fuente en C}