Con el reconocimiento de la red vemos los equipos que están conectados a nuestra red

Enumerar Ips disponibles en nuestra red:

## Tools
### arp-scan
primero debemos conocer cual es nuestra interfaz:

`ifconfig`

`arp-scan -I {interfaz de red} --localnet` {eth0}
>  `arp-scan -I etho --localnet` 

## nediscover
primero debemos conocer la IP local con ifconfig
`netdiscover -i {interfaz de red} -r ip.0/24`
> netdiscover -i eth0 -r 192.168.1.0/24



## nmap

hacer un escaneo de la red con nmap
`nmap -sn ip.0/24`
>nmap -sn 192.168.1.0/24

para exportar la salida a un fichero
> 'nmap -sn 192.168.1.0/24 -.N nombrefichero.txt'


# Reconocimiento

LAS Direcciones MAC que empiezan por 08:00 ..... --> es una maquina virtual

# reconocer el Sistema Operativo
ping -c IP


ttl = 128 --> Windows
ttl = 64 --> Linux