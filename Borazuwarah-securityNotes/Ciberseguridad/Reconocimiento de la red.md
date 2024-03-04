Con el reconocimiento de la red vemos los equipos que están conectados a nuestra red

Enumerar Ips disponibles en nuestra red:
Las maquinas virtuales empiezan por 00:0

## Tools
### arp-scan
primero debemos conocer cual es nuestra interfaz:

`ifconfig`

`arp-scan -I {interfaz de red} --localnet` {eth0}
>  `arp-scan -I etho --localnet` 
>  ![[arp-scan.png]]

## nediscover
primero debemos conocer la IP local con ifconfig
`netdiscover -i {interfaz de red} -r ip.0/24`
> netdiscover -i eth0 -r 192.168.1.0/24
> ![[netdiscord.png]]



## nmap

hacer un escaneo de la red con nmap
`nmap -sn ip.0/24`
>nmap -sn 192.168.1.0/24
>![[nmap netdiscover.png]]

para exportar la salida a un fichero
> 'nmap -sn 192.168.1.0/24 -.N nombrefichero.txt'


# Reconocimiento

Las Direcciones MAC que empiezan por 08:00 ..... --> es una maquina virtual
> ![[maquina virtual en reconocimiento.png]]

# reconocer el Sistema Operativo
ping -c1  IP


ttl = 128 --> Windows
> ![[ping ttl128 windows.png]]
ttl = 64 --> Linux
> ![[ping ttl64 Linux.png]]