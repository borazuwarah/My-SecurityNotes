Kali 192.168.1.20
Windows: 192.168.1.40
			10.10.10.23
Maquina Linux: 10.10.10.30


A traves de metasploit entramos en windows y conseguimos meterpreter
ipconfig

listamos las distintas interfaces de red de la maquina


cuando encontramos la ip de la maquina enotra red, es la maquina es donde se tiene qque hacer pivoting

actualizamos el mapa de red para que sea correcto

despues hacemos lo siguiente
metasploit
use windows/gather/arp_scanner  #scanneador de red en windows con metasploit

swho option
session Id
rhost es rango de la ip de la nueva interfaz de red 
rhost : 10.10.10.4/24

nos muestra un listado de maquinas en este rango de Ips
ahora hay que enrutar el trafico de la maquina windows a la otra maquina que hemos encontrado
metasploit usamos autorute
use multi/manage/autorute

show options
session Id 

run


//en este paso tenemos la IP 


escaneo de puertos de la maquina victima

metasploit use scanner/portsscan/tcp
show options
set rhost ip maquina victima
run
y listado de puertos abiertos

para acceder al puerto 80 por ejemplo
metasploit
use/windows/manage/portproxy
show options
connect addres --> ip maquina victima
connect port ip que queremos acceder
local addres ponemos 0.0.0.0
se local_port 5000 //port forwarding

lo que hay en el puerto 80 va a entrar en el puerto 5000 de la maquina locl

run
entramos en el navegador ponemos la IP de la maquina donde se hace el pivoting (windows): 5000 -->
