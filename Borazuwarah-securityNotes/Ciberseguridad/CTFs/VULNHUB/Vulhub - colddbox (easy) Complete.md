[ColddBox: Easy ~ VulnHub](https://www.vulnhub.com/entry/colddbox-easy,586/)

Kali:  192.168.1.144
VM:  192.168.1.132

#wpscan
#wordpress #usuarioswordpress
#escaladaPrivilegios 
machine:
![[vulnhab - coldbox - Machine.png]]

Download: [https://mega.nz/file/VldHiIgA#4nRI2LPZs_x48_-ryCkPvL6Em2lQTSJEKvoReieDMec](https://mega.nz/file/VldHiIgA#4nRI2LPZs_x48_-ryCkPvL6Em2lQTSJEKvoReieDMec)
Download (Mirror): [https://download.vulnhub.com/colddbox/ColddBoxEasy_EN.ova](https://download.vulnhub.com/colddbox/ColddBoxEasy_EN.ova)

# Reconocimiento

En el arranque vemos en la Grub que el SSOO es un Linux (Ubuntu)

![[vulnhab - coldbox  - Obtener la IP.png]]


Ping:
![[vulnhab - coldbox  - Ping ttl = 64.png]]

Nos cercioramos que es una linux hacinedo ping y viendo el TTL =64
Nmap: 

```sh title:"nmap pasado "
sudo nmap -p- --open -sS -sC -sV 192.168.1.132
```

![[vulnhab - coldbox  - Namp.png]]
Encontramos:
Verificación  de sistema operativo (Ubuntu)
Puerto 80 con un Apache 2.4.18
Puerto 80 corriendo un Wordpress 4.1.31
puerto 4512 servicio ssh OpenSSH 7.2p2



entramos en la web desde el navegador
vemos una web por defecto de Wordpress:
![[vulnhab - coldbox  - Wordpress default.png]]

vamos a chequear con Whatweb, por si nos da algo más de info
whatweb 192.168.1.132
![[vulnhab - coldbox  - Whatweb.png]]
Confirmamos la version de wordpress 4.1.31
confirmamos la version de Apache 2.4.18


En la web descubirmos que hay un apartado que pone Login:
![[vulnhab - coldbox  - Wordpress loginn.png]]

si intentamos poner un usu que sabemos que no existe vemos el siguiente mensaje:

Invaild username, por lo que se puee pensar que el panel de login no está securizado
![[vulnhab - coldbox  - Login wordpress.png]]

Moviendonos por la web encontramos un sitio donde podemos dejar un comentario:
![[vulnhab - coldbox  - Form add comment.png]]
Dejamos un comentario
![[vulnhab - coldbox  - Nuestro comentario.png]]

ahora vamos a inentar hacer login con nuesttro usuario para ver el mensaje 
![[vulnhab - coldbox  - Memensaje error.png]]

Recibimos el mismo mensaje, por lo que vamos a tirar de WP scan
con
wpscan - e u --url 192.168.1.132 enumeramos los usuarios del wordpress

![[vulnhab - coldbox  - Enumeracion usuarios wordpress.png]]

Encomtramos usuarios
- hugo
- philip
- c0ldd
ahora vamos a ver si cambia el mensaje de error al inentar hacer login con uno de estos usuarios:
![[vulnhab - coldbox  - Tet hugo user wordpress.png]]
Exacto, el mensaje de error ha cambiado por lo que tenemos una buena puerta para probar accesos con fuerza bruta

# Explotacion
con cada usuario (hasta que demos con alguno con privilegios) ejecutamos el rockyou con el siguiente comando:
wpscan --url 192.168.1.132 --password /usr/share/wordlists/rockyou.txt --usernames hugo
wpscan --url 192.168.1.132 --password /usr/share/wordlists/rockyou.txt --usernames philip
wpscan --url 192.168.1.132 --password /usr/share/wordlists/rockyou.txt --usernames c0ldd
con el usuario c0ldd encontramos una contraseña
![[vulnhab - coldbox  - Get coldbox passwor for wordpress.png]]



Lo probamos en el panel de login
y accedemos a wordpress:
![[vulnhab - coldbox  - Wordpress access.png]]


Una vez en wordpress vamos a intentar pasar una reverse 
siguiendo los pasos de esta web:
https://medium.com/@akshadjoshi/from-wordpress-to-reverse-shell-3857ee1f4896

Editamos el tema 404.php
cambiamos todo el codigo por el de este repositiorio de github:
https://github.com/pentestmonkey/php-reverse-shell/blob/master/php-reverse-shell.php
y lo actualizamos segun nuestra red y puerto:
![[vulnhab - coldbox  - Editar tema de wordrepss.png]]


ahora guardamos y nos ponemos en escucha por el puerto 1234


nc -lvp 1234
ahora tenemos que entrar en una ruta que no exissta del wordpress para que se ejecute el tema 404
lanzamos peticion a:


192.168.1.132/wp-content/themes/twentyfifteen/404.php
y obtenemos una revershell
![[vulnhab - coldbox  - Revershesell obtenida.png]]

ahora vamos a ver que usuario somos y que podemos hacer
![[vulnhab - coldbox  - Listado de usuarios.png]]

como vemos somos el usuario www-data pero podemos ver que existe el usuario c0ldd
vamos a intentar pivotar al usuario c0ldd

![[vulnhab - coldbox  - Intento de acceso a usuario c0ld.png]]
vamos a ver la contraseña para la base de datos en el fichero wp-config.php

![[vulnhab - coldbox  - Ver el fichero wp-config.php.png]]
Usuario c0ldd contraseña : cybersecurity

vamos a intentar acceder por ssh con este usuario


tenemos acceso ssh al puerto 4512 con el usuario c0ldd y la contraseña cibersecurity
![[vulnhab - coldbox  - Aceso ssh usuario c0ldd.png]]]

![[vulnhab - coldbox  - User flag.png]]


flag usuario: RmVsaWNpZGFkZXMsIHByaW1lciBuaXZlbCBjb25zZWd1aWRvIQ==     

como vemos está en base 64, la desciframos
Decodeada:
Felicidades, primer nivel conseguido!

![[vulnhab - coldbox  - Decode user flag.png]]

## escalada de privilegios

hacemos un sudo -l
![[vulnhab - coldbox  - Escalada de privilegios sudo -l.png]]

vemos que existen varios vectores vamos a empezar por el bin/vim

en la web:
[vim | GTFOBins](https://gtfobins.github.io/gtfobins/vim/)
vemos lo siguiente
![[vulnhab - coldbox  - Escalada de privilegios vim.png]]

lo intentamos ejecutar segun nos dice la web
![[vulnhab - coldbox  - Intento de abusar de vim.png]]

no consigo privilegios
intento con chmod
![[vulnhab - coldbox  - Abuso de chmod.png]]
pero no encuentor nada mas que para cmabiar permisos a ficheros
buscamos por ftp
![[vulnhab - coldbox  - Abuso de FTP.png]]sudo en ftp:
![[vulnhab - coldbox  - Abusando de FTP sudo.png]]lo probamos:
![[vulnhab - coldbox  - Sudo acces.png]]


ya somos sudo 
ahora buscamos la flag del sudo:
![[vulnhab - coldbox  - Root flag.png]]


Flag sudo:
wqFGZWxpY2lkYWRlcywgbcOhcXVpbmEgY29tcGxldGFkYSE=


![[vulnhab - coldbox  - Decode sudo flag.png]]

sudo flag: ¡Felicidades, máquina completada! 




[vim | GTFOBins](https://gtfobins.github.io/gtfobins/vim/)
abusando del vim:
![[vulnhab - coldbox  - Abusnado del vim para escalada de privilegios.png]]