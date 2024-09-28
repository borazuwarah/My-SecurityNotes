plataforma: https://dockerlabs.es/#/
Mirror: https://mega.nz/file/wD9BgLDR#784mjg4xwoolyyKMqdGLk1_YntbJLItJ7RFRx9A69ZE
Nombre: Trust
Dificultad: muy fácil
Creador:  El Pingüino de Mario
Herramientas:
[[Docker]]
[[Ping]]
[[NMAP]]
[[Gobuster]]
[[dirbuster (web)]]
[[Hydra, Ataques de Fuerza Bruta y John the Ripper]]
[[Puerto 22 SSH - SFTP (TCP)]]
[[Escalada de privilegios en LINUX]]


## Despliegue

```sh fold:"Levantamos la maquina en docker"
sudo bash auto_deploy.sh trust.tar 
```

![[DockerLabs - Trust - Despliegue.png]]


Comprobamos conectividad con un ping
```sh fold:"ping a la maquina"
pìng -c1 172.18.0.2
```

![[DockerLabs - Trust - Ping.png]]

## Reconocimiento
lanzamos un nmap para un reconocimiento:

```sh fold:"Nmap"
sudo nmap -sS -p- -sC -sV -Pn 172.18.0.2
```

![[DockerLabs - Trust - nmap.png]]

Descubrimos los puertos 
80 y  22

## Reconocimiento puerto 80

abrimos el navegador para ver la web:
![[DockerLabs - Trust - Web por defecto.png]]

Aparece la web por defecto de apache.
vamos a buscar en el código fuente:
![[DockerLabs - Trust - Codigo web de apache.png]]

Pero no aparece nada interesante (esperaba algún comentario o algo así) en esta web
por tanto seguimos investigando haciendo gobuster, para encontrar rutas:

```sh fold:"Gobuster"
sudo gobuster dir -u http://192.168.1.141/ -w /usr/share/wordlists/seclists/Discovery/Web-Content/directory-list-lowercase-2.3-medium.txt 
```

No encontramos ninguna  carpeta interesante

![[DockerLabs - Trust - Gobuster.png]]

Al no encontrar rutas, vamos a intentar localizar ficheros haciendo Fuzzing con dirbuster:

![[DockerLabs - Trust - dirbuster.png]]


Le damos a start y empieza el scaneo:

![[DockerLabs - Trust - dirbuster result.png]]


172.18.0.2/secret.php:
![[DockerLabs - Trust - secret.php.png]]



Esta web parece no tener contenido interesante pero no es así, si nos fijamos en el mensaje:
Hola Mario,
Esta web no se puede hackerar.


Vemos que tenemos un usuario: Mario.

## intrusión

Si recordamos también está el puerto 22 (ssh) abierto, y con el usuario Mario podríamos intentar fuerza bruta con hydra:
```sh fold:"fuerza bruta al ssh con hydra"
hydra -l juan -P /usr/share/wordlists/rockyou.txt ssh://192.168.0.27
```

Cuidado aquí porque el usuario la nota estaba en mayuscula: Mario y el usuario es minuscula, 
ha costado varias vueltas a hydra

resultado:
![[DockerLabs - Trust - hydra al ssh resu.png]]
Tenemos credenciales ssh: accedemos

![[DockerLabs - Trust - acceso SSH.png]]

Accedemos por SSH con el usuario mario

# Escalada de privilegios

hacemos un sudo -l y vemos lo siguiente:
![[DockerLabs - Trust - Escalada sudo -l.png]]

Buscamos la escalada de privilegios en gtfobbins para vim:

![[DockerLabs - Trust - Gtfobbins vim.png]]


Ponemos en practica lo encontrado:
aunque tenemos que adaptar el comando:


sudo vim -c ':!/bin/sh' --> sudo vim -c ':!/bin/bash'


![[DockerLabs - Trust - Root.png]]