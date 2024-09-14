	sudo  Escaneos basicos con Nmap
Herramienta para el reconocimiento de puertos

<iframe width="560" height="315" src="https://www.youtube.com/embed/XLGrMpbH8GU?si=XjsinX2VwuI0Yg71" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

## Instalación de NMAP

```sh fold:"Instalacion de Nmap"
sudo apt install nmap # instalación
```


`nmap {ip maquina}` hace un reconocimiento de puertos

```sh fold:"nmap directo sin parametros"
sudo  nmap 192.168.1.X
```

> nmap 192.168.1.137
> ![[nmap basico.png]]

## Parámetros

Información de algunos parámetros:
- **-p-** –> Busqueda de puertos abiertos (engloba todos los puertos)
- **–open** –> Enumera los puertos abiertos
- **-sS** –> Es un modo de escaneo rápido
- -->envias un SYN
- **-sC** –> Que use un conjunto de scripts de reconocimiento
- **-sV** –> Que encuentre la versión del servicio abierto
- **–min-rate=5000** –> Hace que el reconocimiento aun vaya más rápido mandando no menos de 5000 paquetes
- **-n** –> No hace resolución DNS (va más rapido)
- **-Pn** –> No hace ping
- -sU -> Escaneo por UDP
- -sn hace un ping a toda la red para descubrir maquinas activas
- -sT -> realizará un escaneo TCP de conexión completao TCP Connect Scan.
- **-vvv** –> Muestra en pantalla a medida que encuentra puertos (Verbose)
- -p  --> "puerto1,puerto2,puerto3,..." "dirección_IP" # escaneo de puertos seleccionados
-  -O --> Obtención del sistema operativo

***Eludir firewall***
- -f --> fragmentar paquetes
- --mtu {multiplo de 8} -->es el tamaño del MTU
- -D {ip- inventada} --> camufla los paquetes desde la IP inventada 
- --source-port {puerto} --> settea el puerto de Origen al indicado y no el que te coja el sistema operativo por defecto
- --data-length {valor Numérico} --> ya que todos los paquetes por defecto es de 58 y es posible que un firewall lo bloquee por tamaño de paquete, de esta forma el length del paquete será 58 + el valor Numerico indicado
- --spoof-mac {DELL / mac/Vmware} --> ya que es posible que nuestra mac esté bloqueada, de esta forma hacemos un cambio de nuestra mac
- 
**Ajustes de tiempos**
	-  -T0 <dirección_IP> # Paranoid (Paranoico, más lento) 
	- -T1 <dirección_IP> # Sneaky (Sigiloso) 
	- -T2 <dirección_IP> # Polite (Cortés) 
	- -T3 <dirección_IP> # Normal (Normal) 
	- -T4 <dirección_IP> # Aggressive (Agresivo)  
	- -T5 <dirección_IP> # Insane (Insano, más rápido)


### -p-
mirará todos los puertos que pueda tener  esa maquina 


```sh fold:"nmap para ver los puertos en la máquina"
sudo  -p- nmap 192.168.1.X
```

> ![[nmap -p-.png]]

### --open
 muestra los puertos abiertos que pueda tener esa maquina


```sh fold:"nmap directo sin parametros"
sudo  nmap 192.168.1.X
```
> ![[nmap --open puertos abiertos.png]]

### -sS
para que sea rapido el scaneo "simple scan"
>![[nmap -sS.png]]

### -sC
Es para hacer un escaneo más exhaustivo con una serie de scrip con los que cuenta nmap
>![[nmap con -sC.png]]

### -sV
Para localizar la version del servicio que está corriendo en cada puerto abierto

>![[nmap con -sV.png]]

### --min-rate 5000 

para que la cantidad de paquetes que envia sea minimo de 5000 por segundo
>![[nmap con -min-rate 5000.png]]


Ojo para maquinas locales de CTFs min-rate 5000
Para examenes oficiales min-rate 2000 / 1500  (para evitar saturar la red)

## -n
-n es para evitar hacer resolucion DNS
![[nmap con -n.png]]

### -Pn
 "no ping" por si la maquina objetivo esta limintando el ping icmp
>![[nmap -Pn.png]]

## -vvv 
trilple vervose para que reporte cosas conforme las encuentra
> ![[nmap con -vvv.png]]

## -oN {nombreFichero} 
para exportar todo el escaneo a un fichero
> ![[nmap a fichero -oN nombrefichero.png]]


## --script "vuln" --p{puerto encontrado} {ipobjetivo}
Lanza un Script para saber si la Maquina victima tiene alguna vulnerabilidad conocida en ese puerto
![[Comando - Nmap script vulen.png]]

Get the CVE
![[Comando - Nmap Get CVE with script.png]]



----
# NMAP en UDP

nmap -sU enumeracion de puertos en UDP

nmap -sU --top-ports 200 enumera los 200 puertos mas importantes en UDP
![[Comando - Nmap en UDP.png]]


## -sU
hace escaneo por el protocolo UDP