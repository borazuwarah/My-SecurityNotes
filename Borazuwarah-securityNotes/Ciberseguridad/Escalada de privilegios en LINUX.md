
https://www.youtube.com/watch?v=ginzuvA22Nw

explotando los binarios
https://gtfobins.github.io/

primer sudo -l
si se encuntra algun software que se pueda explotar lo revisamos en la web grfobins




Revisar si tenemos permiso de escritura en /etc/passwd:
find / -writable -type f 2>/dev/null |grep '/etc/passwd' && ls -lah /etc/passwd
find