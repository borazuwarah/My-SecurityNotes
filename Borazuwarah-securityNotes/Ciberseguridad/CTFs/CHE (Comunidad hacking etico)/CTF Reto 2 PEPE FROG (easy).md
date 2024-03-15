Machine: [Challenges : - Web CTF de la Comunidad de Hacking Ético (comunidadhackingetico.es)](https://ctf.comunidadhackingetico.es/challenges)
## Reconocimiento

Descubrimos la IP: 192.168.1.143:
![[Discover the network.png]]

Nmap:
sudo nmap -p- --open -sS -sC -sV 192.168.1.141
![[pepefrogNmap.png]]

revisamos lo que vemos en el puerto:
![[pepefrogweb.png]]

vemos el codigo fuente

![[CodigoFuente.png]]
hacemos fuzzing web:

![[gobuster.png]]

y encontramos la carpeta /img
abrimos la url /img

nos encontramos 2 imagenes:
![[imagenes encontradas.png]]

Descargamos las imagenes con wget:
wget wget 192.168.1.141/img/pepe_the_frog.gif
wget wget 192.168.1.141/img/pepe_the_frog.jpg


Decodigicamos el Salvaconducto encontrado en el codigo fuente: UzRsdjBDMG5EdUN0MCE=
por el formato vemos que es Base64: S4lv0C0nDuCt0!

![[DecodeSalvaconductoBase64.png]]
# Estenografia

steghide extract -sf pepe_the_frog.jpg

![[steghide.png]]

Encontramos unos accesos ssh:

y conectamos mediante SSH
Conexion SSH a la maquina con usuario PDPDFrog:
![[SSH User Connection.png]]

Nos encontramos con la flag de user
![[userFlag.png]]

Luego nos encontramos con la flag del root:
![[root flag.png]]