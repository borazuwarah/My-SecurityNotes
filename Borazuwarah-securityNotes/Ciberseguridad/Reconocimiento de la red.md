Con el reconocimiento de la red vemos los equipos que están conectados a nuestra red

Enumerar y encontrar  Ips disponibles en nuestra red:
Las maquinas virtuales empiezan por 00:0

## Tools
### arp-scan
primero debemos conocer cual es nuestra interfaz:

```sh fold:"comando ifconfig"
ifconfig
```

`arp-scan -I {interfaz de red} --localnet` {eth0}
>  `arp-scan -I etho --localnet` 
>  ![[arp-scan.png]]

## nediscover
primero debemos conocer la IP local con ifconfig
```sh fold:"Netdiscover"
netdiscover -i {interfaz de red} -r {ip.0/24}

# netdiscover -i eth0 -r 192.168.1.0/24
```
> ![[netdiscord.png]]



## nmap

hacer un escaneo de la red con nmap
`nmap -sn ip.0/24`
>nmap -sn 192.168.1.0/24
>![[nmap netdiscover.png]]

para exportar la salida a un fichero
> 'nmap -sn 192.168.1.0/24 -.N nombrefichero.txt'


# Reconocimiento

Las Direcciones MAC que empiezan por :00:XXXX ..... --> es una maquina virtual
> ![[maquina virtual en reconocimiento.png]]

# reconocer el Sistema Operativo
ping -c1  IP


ttl = 128 --> Windows
> ![[ping ttl128 windows.png]]
ttl = 64 --> Linux
> ![[ping ttl64 Linux.png]]


# barrido.sh
[condor777-bit/barrido: A Bash script for scanning the local network to identify machines, retrieve their IP and MAC addresses, and determine the operating system using TTL values. The script prompts the user to enter the network interface and checks for the presence of `arp-scan`, installing it if necessary. (github.com)](https://github.com/condor777-bit/barrido)

para poder ejecutarlo desde cualquier sitio tenemos que agregar el path del scrip a la shell
primero le damos permisos de ejecucion
chmod +x barrido.sh (en la ruta donde queramos almacenarlo para siempre)
luego agregamos el fichero sh al path


2 opciones 
- pasar la ruta a la carpeta del path:
- Pasar solo el archivo

pasar el archivo 
ln -s {path/del/archivo/fichero.sh /usr/bin}
```sh fold:"agregar fichero a path"
sudo  ln -s {path/del/fichero/file.sh /path/guardados}

# Para Ver algun Path que tengamos guardado podemos sacarlo con 
echo $PATH
``` 


Agregar una carpeta entera al Path

hay que hacer un export de la ruta al path

export PATH=$PATH: /ruta/carpeta/ficheros

```sh fold:"agregar carpeta completa al path"
sudo  export PATH=$PATH: /ruta/carpeta/ficheros

# Para Ver si se ha agregado podemos usar:
echo $PATH 
``` 