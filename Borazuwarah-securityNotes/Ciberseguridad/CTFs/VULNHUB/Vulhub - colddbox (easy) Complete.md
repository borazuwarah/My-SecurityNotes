[ColddBox: Easy ~ VulnHub](https://www.vulnhub.com/entry/colddbox-easy,586/)

Kali:  192.168.1.144
VM:  192.168.1.132

#wpscan
#wordpress #usuarioswordpress
#escaladaPrivilegios 
# Reconocimiento

En el arranque vemos en la Grub que el SSOO es un Linux (Ubuntu)

![[VulnHab coldbox - Obtener la IP.png]]


Ping:
![[Vulnhab coldbox- ping ttl = 64.png]]

Nos cercioramos que es una linux hacinedo ping y viendo el TTL =64
Nmap: 

```sh title:"nmap pasado "
sudo nmap -p- --open -sS -sC -sV 192.168.1.132
```

![[vulnHab coldbox - namp.png]]
Encontramos:
Verificación  de sistema operativo (Ubuntu)
Puerto 80 con un Apache 2.4.18
Puerto 80 corriendo un Wordpress 4.1.31
puerto 4512 servicio ssh OpenSSH 7.2p2



entramos en la web desde el navegador
vemos una web por defecto de Wordpress:
![[vulnhab coldbox - wordpress default.png]]

vamos a chequear con Whatweb, por si nos da algo más de info
whatweb 192.168.1.132
![[vulnhab whatweb.png]]
Confirmamos la version de wordpress 4.1.31
confirmamos la version de Apache 2.4.18


En la web descubirmos que hay un apartado que pone Login:
![[vulnhab-coldbox wordpress loginn.png]]

si intentamos poner un usu que sabemos que no existe vemos el siguiente mensaje:

Invaild username, por lo que se puee pensar que el panel de login no está securizado
![[vulnhab - coldbox login wordpress.png]]

Moviendonos por la web encontramos un sitio donde podemos dejar un comentario:
![[vulnhab coldbox form.png]]
Dejamos un comentario
![[vulnhab - coldbox nuestro comentario.png]]

ahora vamos a inentar hacer login con nuesttro usuario para ver el mensaje 
![[vulnhub- coldbox emensaje error.png]]

Recibimos el mismo mensaje, por lo que vamos a tirar de WP scan
con
wpscan - e u --url 192.168.1.132 enumeramos los usuarios del wordpress

![[vulnhub-coldbox -enumeracion usuarios wordpress.png]]

Encomtramos usuarios
- hugo
- philip
- c0ldd
ahora vamos a ver si cambia el mensaje de error al inentar hacer login con uno de estos usuarios:
![[vulnhub coldbox - tet hugo user wordpress.png]]
Exacto, el mensaje de error ha cambiado por lo que tenemos una buena puerta para probar accesos con fuerza bruta

# Explotacion
con cada usuario (hasta que demos con alguno con privilegios) ejecutamos el rockyou con el siguiente comando:
wpscan --url 192.168.1.132 --password /usr/share/wordlists/rockyou.txt --usernames hugo
wpscan --url 192.168.1.132 --password /usr/share/wordlists/rockyou.txt --usernames philip
wpscan --url 192.168.1.132 --password /usr/share/wordlists/rockyou.txt --usernames c0ldd
con el usuario c0ldd encontramos una contraseña
![[vulnhub coldbox - get coldbox passwor for wordpress.png]]



Lo probamos en el panel de login
y accedemos a wordpress:
![[vulnhub-coldbox wordpress access.png]]


Una vez en wordpress vamos a intentar pasar una reverse 
siguiendo los pasos de esta web:
https://medium.com/@akshadjoshi/from-wordpress-to-reverse-shell-3857ee1f4896

Editamos el tema 404.php
cambiamos todo el codigo por el de este repositiorio de github:
https://github.com/pentestmonkey/php-reverse-shell/blob/master/php-reverse-shell.php
y lo actualizamos segun nuestra red y puerto:
![[vulnhub-coldBox -Editar tema de wordrepss.png]]


ahora guardamos y nos ponemos en escucha por el puerto 1234


nc -lvp 1234
ahora tenemos que entrar en una ruta que no exissta del wordpress para que se ejecute el tema 404
lanzamos peticion a:


192.168.1.132/wp-content/themes/twentyfifteen/404.php
y obtenemos una revershell
![[vulnhub coldbox -revershesell obtenida.png]]

ahora vamos a ver que usuario somos y que podemos hacer
![[vulhub - coldbox listado de usuarios.png]]

como vemos somos el usuario www-data pero podemos ver que existe el usuario c0ldd
vamos a intentar pivotar al usuario c0ldd

![[vulnhub- doldbox intento de acceso a usuario c0ld.png]]
vamos a ver la contraseña para la base de datos en el fichero wp-config.php

![[vulnhub coldbox - ver el fichero wp-config.php.png]]
Usuario c0ldd contraseña : cybersecurity

vamos a intentar acceder por ssh con este usuario


tenemos acceso ssh al puerto 4512 con el usuario c0ldd y la contraseña cibersecurity
![[vulnhub - coldbox -aceso ssh usuario c0ldd.png]]]

![[vulnhub - coldbox User flag.png]]


flag usuario: RmVsaWNpZGFkZXMsIHByaW1lciBuaXZlbCBjb25zZWd1aWRvIQ==     

como vemos está en base 64, la desciframos
Decodeada:
Felicidades, primer nivel conseguido!

![[vulnhub - coldbox decode user flag.png]]

## escalada de privilegios

hacemos un sudo -l
![[vulnhub coldbox - escalada de privilegios sudo -l.png]]

vemos que existen varios vectores vamos a empezar por el bin/vim

en la web:
[vim | GTFOBins](https://gtfobins.github.io/gtfobins/vim/)
vemos lo siguiente
![[vulnhub coldBox-escalada de privilegios vim.png]]

lo intentamos ejecutar segun nos dice la web
![[vulnhub coldbox - intento de abusar de vim.png]]

no consigo privilegios
intento con chmod
![[vulhub -coldbox abuso de chmod.png]]
pero no encuentor nada mas que para cmabiar permisos a ficheros
buscamos por ftp
![[vulnhub coldmod - abuso de FTP.png]]sudo en ftp:
![[vulhub - coldbox - abusando de FTP sudo.png]]lo probamos:
![[vulnhub - coldmod sudo acces.png]]


ya somos sudo 
ahora buscamos la flag del sudo:
![[vulnhub coldbox root flag.png]]


Flag sudo:
wqFGZWxpY2lkYWRlcywgbcOhcXVpbmEgY29tcGxldGFkYSE=


![[vulnhub- codbox decode sudo flag.png]]

sudo flag: ¡Felicidades, máquina completada! 




[vim | GTFOBins](https://gtfobins.github.io/gtfobins/vim/)
abusando del vim:
![[vulnhub - coldbox - abusnado del vim para escalada de privilegios.png]]