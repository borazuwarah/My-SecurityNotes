	sudo  Escaneos basicos con Nmap
Reconocimiento de puertos

`nmap {ip maquina}` hace un reconocimiento de puertos

```sh fold:"nmap directo sin parametros"
sudo  nmap 192.168.1.X
```
> nmap 192.168.1.137
> ![[nmap basico.png]]

## Parametros

-p- mirará todos los puertos que pueda tener  esa maquina 


```sh fold:"nmap para ver los puertos en la máquina"
sudo  -p- nmap 192.168.1.X
```

> ![[nmap -p-.png]]

--open muestra los puertos abiertos que pueda tener esa maquina


```sh fold:"nmap directo sin parametros"
sudo  nmap 192.168.1.X
```
> ![[nmap --open puertos abiertos.png]]

-sS para que sea rapido el scaneo "simple scan"
>![[nmap -sS.png]]

-sC es para hacer un escaneo más exactivo con una serie de scrip con los que cuenta nmap
>![[nmap con -sC.png]]

-sV para localizar la version del servicio que está corriendo en cada puerto abierto
>![[nmap con -sV.png]]

-min-rate 5000 para que la cantidad de paquetes que envia sea minimo de 5000 por segundo
>![[nmap con -min-rate 5000.png]]


Ojo para maquinas locales de CTFs min-rate 5000
Para examenes oficiales min-rate 2000 / 1500  (para evitar saturar la red)


-n es para evitar hacer resolucion DNS
> D]]

-Pn "no ping" por si la maquina objetivo esta limintando el ping icmp
>![[nmap -Pn.png]]

-vvv trilple vervose para que reporte cosas conforme las encuentra
> ![[nmap con -vvv.png]]

-oN {nombreFichero} para exportar todo el escaneo a un fichero
> ![[nmap a fichero -oN nombrefichero.png]]


--script "vuln" --p{puerto encontrado} {ipobjetivo}
Lanza un Script para saber si la Maquina victima tiene alguna vulnerabilidad conocida en ese puerto
![[Comando - Nmap script vulen.png]]

Get the CVE
![[Comando - Nmap Get CVE with script.png]]



----
# NMAP en UDP

nmap -sU enumeracion de puertos en UDP

nmap -sU --top-ports 200 enumera los 200 puertos mas importantes en UDP
![[Comando - Nmap en UDP.png]]