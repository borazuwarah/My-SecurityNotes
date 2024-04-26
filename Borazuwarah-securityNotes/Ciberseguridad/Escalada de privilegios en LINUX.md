
https://www.youtube.com/watch?v=ginzuvA22Nw

explotando los binarios
https://gtfobins.github.io/

primer sudo -l

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




