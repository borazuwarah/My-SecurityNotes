Plataforma: Comunidad Hacking Ético
MIrror: [Challenges : - Web CTF de la Comunidad de Hacking Ético (comunidadhackingetico.es)](https://ctf.comunidadhackingetico.es/challenges)
Autor: 

Herramientas usadas: 
- [[ARP-Scan]]
- [[Linux/wget|wget]]
- [[NMAP]]
- [[Gobuster]]
- [[Base64]]
- [[Steghide]]
- [[Linux/wget]]
## Reconocimiento

Descubrimos la IP: 192.168.1.143:
```sh title:"Descruburir la IP"
arp-scan -I eth0 --localnet
```
![[CHE - PEPETHEFORG - Discover the network.png]]

Nmap
```sh title:"Nmap"
sudo nmap -p- --open -sS -sC -sV 192.168.1.141
```

![[CHE - PEPETHEFORG - Nmap.png]]

revisamos lo que vemos en el puerto:
![[CHE - PEPETHEFORG - Web.png]]

vemos el codigo fuente

![[CHE - PEPETHEFORG - CodigoFuente.png]]
hacemos fuzzing web:

![[CHE - PEPETHEFORG - Gobuster.png]]

y encontramos la carpeta /img
abrimos la url /img

nos encontramos 2 imagenes:
![[CHE - PEPETHEFORG - Imagenes encontradas.png]]

Descargamos las imagenes con wget:

```sh title:"Wget"
wget 192.168.1.141/img/pepe_the_frog.gif
wget 192.168.1.141/img/pepe_the_frog.jpg
```


Decodigicamos el Salvaconducto encontrado en el codigo fuente: UzRsdjBDMG5EdUN0MCE=
por el formato vemos que es Base64: S4lv0C0nDuCt0!

![[CHE - PEPETHEFORG - Decode Salvaconducto Base64.png]]
# Estenografia

```sh title:"stepghide"
steghide extract -sf pepe_the_frog.jpg
```

![[CHE - PEPETHEFORG - Steghide.png]]

Encontramos unos accesos ssh:

y conectamos mediante SSH
Conexion SSH a la maquina con usuario PDPDFrog:
![[CHE - PEPETHEFORG - SSH User Connection.png]]

Nos encontramos con la flag de user
![[CHE - PEPETHEFORG - User Flag.png]]

Luego nos encontramos con la flag del root:
![[CHE - PEPETHEFORG - Root flag.png]]