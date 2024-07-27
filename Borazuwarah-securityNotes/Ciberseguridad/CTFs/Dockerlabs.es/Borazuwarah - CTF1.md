plataforma: https://dockerlabs.es/#/
Mirror: https://mega.nz/file/gWNQlaZD#CgYMb_EEBL0jcypTg0xZZUaIqhO47ueX6pPU6utLy1U
Nombre: BorazuwarahCTF1
Dificultad: muy fácil
Formato: Docker
Autor: Borazuwarah


Descargamos y descomprimimos la máquina

```sh fold:"Levantamos la maquina en docker"
sudo bash auto_deploy.sh borazuwarahctf.tar 
```

Comprobamos que está levantada:

![[Dockerlabs - BorazuwarTF1 - Depliegue de máquina.png]]

a vez la máquina se despliegua vemos que tenemos la IP: 172.17.0.2
hacemos un ping para comprobar la conexión y el sistema operativo:

![[Dockerlabs - BorazuwarTF1 - Ping.png]]

Sistema operativo Linux y conectividad correcta
Ahora hacemos un escaneo de puertos para comprobar que nos encontramos:

```sh fold:"Nmap"
sudo nmap -sS -p- -sC -sV -Pn 172.17.0.2
```


![[Dockerlabs - BorazuwarTF1 - Nmap.png]]
os encontramos:
puerto 80 
puerto 22

vamos a visitar la web a ver que nos encontramos:
![[Dockerlabs - BorazuwarTF1 - Web.png]]

Vamos a ver el codigo fuente por si encontramos algo:
![[Dockerlabs - BorazuwarTF1 - Web - source code.png]]
No parece que podamos encontrar nada interesante en el código.

vamos a hacer un poco de fuzzing

sudo gobuster dir -u http://172.17.0.2 -w /usr/share/wordlists/seclists/Discovery/Web-Content/directory-list-2.3-medium.txt 

pero no encoramos nada
![[Gobuster.png]]

Al no encontrar nada vamos a descargar la imagen de la web ara ver si encontramos algo en la imagen:
Descargamos la imagen con wget
wget http://172.17.0.2/imagen.jpeg

![[Wget.png]]

Primero vamos a investigar con stenografia si la imagen esconde algo
para ello usamos la herramienta:
Steghide
steghide extrat -sf imagen.jpeg


![[Steghide.png]]


nos pidió una password pero probamos con un intro (sin contralseña) y nos ha detectado un fichero secreto .txt
![[Secreto.txt.png]]

Mensaje: 

Sigue buscando, aquí no está to solución
aunque te dejo una pista....
sigue buscando en la imagen!!!


Este mensaje nos hace pensar que vamos por el buen camino aunque lo que queremos encontrar no está en este fichero

vamos a  buscar en los metadatos de este documento
para eso usaremos la herramienta: exiftool
exiftool imagen.jpeg
![[Salida exiftool.png]]

Usuario: borazuwarah

vamos a hacer fuerza bruta con este usuario al protocolo ssh

