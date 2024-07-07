plataforma: https://dockerlabs.es/#/
Mirror: https://mega.nz/file/gWNQlaZD#CgYMb_EEBL0jcypTg0xZZUaIqhO47ueX6pPU6utLy1U
Nombre: BorazuwarahCTF1
Dificultad: muy fácil
Formato: Docker


Descargamos y descomprimimos la máquina

```sh fold:"Levantamos la maquina en docker"
sudo bash auto_deploy.sh borazuwarahctf.tar 
```

Comprobamos que está levantada:

![[Dockerlabs - BorazuwarTF1 - Depliegue de máquina.png]]

a vez la máquina se despliegua vemos que tenemos la IP: 172.17.0.2
hacemos un ping para comprobar la conexión y el sistema operativo:

![[Ping.png]]

Sistema operativo Linux y conectividad correcta
Ahora hacemos un scaneode puerto spara comprobar que nos encontramos:

```sh fold:"Nmap"
sudo nmap -sS -p- -sC -sV -Pn 172.17.0.2
```


![[nmap.png]]
os encontramos:
puerto 80 
puerto 22

vamos a visitar la web a ver que nos encontramos:
![[Web.png]]

Vams a ver elcodigo fuente por siencontramos algo:
![[web - source code.png]]
