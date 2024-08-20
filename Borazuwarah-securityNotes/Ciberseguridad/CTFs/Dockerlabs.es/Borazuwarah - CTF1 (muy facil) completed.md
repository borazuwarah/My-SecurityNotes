plataforma: https://dockerlabs.es/#/
Mirror: https://mega.nz/file/gWNQlaZD#CgYMb_EEBL0jcypTg0xZZUaIqhO47ueX6pPU6utLy1U
Nombre: BorazuwarahCTF1
Dificultad: Muy fácil
Formato: Docker
Autor: Borazuwarah

Herramientas Usadas:
- [[NMAP]]
- [[Ping]]
- [[Ciberseguridad/Herramientas - Tools/Wget|Wget]]
- [[Gobuster]]
- [[Hydra, Ataques de Fuerza Bruta y John the Ripper]]

Puertos:
- [[Puerto 22 SSH - SFTP]]
- [[Puerto 80,443 - Http- Https Servicio Web]]

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


```sh fold:"Gobuster para buscar contenido web"
sudo gobuster dir -u http://172.17.0.2 -w /usr/share/wordlists/seclists/Discovery/Web-Content/directory-list-2.3-medium.txt 
```



pero no encoramos nada
![[Dockerlabs - BorazuwarTF1 - Gobuster.png]]

Al no encontrar nada vamos a descargar la imagen de la web ara ver si encontramos algo en la imagen:
Descargamos la imagen con wget

```sh fold:"wget para descargar contenido"
wget http://172.17.0.2/imagen.jpeg
```

![[Dockerlabs - BorazuwarTF1 - Wget.png]]

Primero vamos a investigar con stenografia si la imagen esconde algo
para ello usamos la herramienta:
Steghide

```sh fold:"Extraer datos de un fichero"
steghide extrat -sf imagen.jpeg
```



![[Dockerlabs - BorazuwarTF1 - Steghide.png]]


nos pidió una password pero probamos con un intro (sin contralseña) y nos ha detectado un fichero secreto .txt
![[Dockerlabs - BorazuwarTF1 - Secreto.txt.png]]

Mensaje: 

Sigue buscando, aquí no está to solución
aunque te dejo una pista....
sigue buscando en la imagen!!!


Este mensaje nos hace pensar que vamos por el buen camino aunque lo que queremos encontrar no está en este fichero

vamos a  buscar en los metadatos de este documento
para eso usaremos la herramienta: exiftool

```sh fold:"Ver los metadatos de un fichero"
exiftool imagen.jpeg
```

![[Dockerlabs - BorazuwarTF1 - Salida exiftool.png]]

Usuario: borazuwarah

vamos a hacer fuerza bruta con este usuario al protocolo ssh
Herramienta Hydra
comando:

```sh fold:"Hydra para hacer fuerza bruta al protocolo ssh"
hydra -l borazuwarah -P /usr/share/wordlists/rockyou.txt ssh://172.17.0.2
```

![[Dockerlabs - BorazuwarTF1 - Hydra borazuwara see password.png]]

![[Dockerlabs - BorazuwarTF1 - Hydra borazuwarah not see password.png]]

Obtenemos la contraseña de usuario borazuwarah:123456
Accedemos por ssh

```sh fold:"Conexion por ssh"
ssh borazuwarah@172.17.0.2
```

![[Dockerlabs - BorazuwarTF1 - SSH connection.png]]

## Escalada de privilegios
primero lanzamos un sudo -l 
```sh fold:"sudo -l para ver si se puede ejecutar algo como root"
sudo -l
```


![[Dockerlabs - BorazuwarTF1 - Sudo -l.png]]

como vemos podemos ejecutar una bash como root:
ejecutamos:

```sh fold:"Abusando de bash"
sudo /bin/bash
```


![[Dockerlabs - BorazuwarTF1 - Escalada de privilegios.png]]
y conseguimos ser root en el laboratio

laboratorio completo!!



