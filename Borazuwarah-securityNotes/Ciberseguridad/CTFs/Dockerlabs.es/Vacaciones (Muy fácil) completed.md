
plataforma: https://dockerlabs.es/#/
Mirror: https://mega.nz/file/YCEGAISD#y6iWUG_auH4vUApClb9ix7H6JmOCKm4vAYS2TjQn59g
Nombre: Vacaciones
Dificultad: muy fácil



1 comprobamos si tenemos docker instalado de no ser así lo instalamos

```sh fold:"Comprobar si docker está instalado"
docker -v
```

```sh fold:"Instalacion de docker"
sudo apt install docker.io
```

Ahora levantamos la maquina:

```sh fold:"Levantamos la maquina en docker"
sudo bash auto_deploy.sh vacaciones.tar 
```


Desplegamos la máquina:

![[Dockerlabs - Vacaciones - Despliegue me maquina.png]]

Hacemos un ping para comprobar conectividad y sistema operativo:

ping 172.17.0.2       
PING 172.17.0.2 (172.17.0.2) 56(84) bytes of data.
64 bytes from 172.17.0.2: icmp_seq=1 ttl=64 time=0.154 ms


ttl=64 --> maquina Linux

ahora vamos a lanzar nmap
```sh fold:"Nmap"
sudo nmap -sS -p- -sC -sV -Pn 172.17.0.2
```



![[Dockerlabs - Vacacioens - Nmap result.png]]

puertos
puerto 22 ssh
puerto 80  http

vamos a lanzar el scrip de nmap para cada puerto:

puerto 80:
```sh fold:"Scrip vulnerabilidades de Nmap puerto 80"
sudo nmap --script "vuln" -p80 172.17.0.2 
```

Descubierto:   After NULL UDP avahi packet DoS (CVE-2011-1002).
![[Dockerlabs - Vacacioens -  Script vbuln p 80.png]]

Ahora lanzamos el del puerto 22:

```sh fold:"Scrip vulnerabilidades de Nmap puerto 22"
sudo nmap --script "vuln" -p22 172.17.0.2 
```


Descubrimos la misma vulnerabilidad
![[Dockerlabs - Vacacioens -  Script Vulnerabilidad P22.png]]
no parece que podamos explotar nada


![[Dockerlabs - Vacacioens -  Vacaciones web.png]]

Al parecer no hay nada en la web:
Vamos a ver el código fuente:

![[Dockerlabs - Vacaciones - Codigo Fuente.png]]
y nos encontramos un mensaje:

<!-- De : Juan Para: Camilo , te he dejado un correo es importante... -->
encontramos 2 usuarios:
- Juan
- Camilo


Alguno de estos usuarios podría estar en el sistema con acceso por SSH (puerto 22)

Como no conocemos la contraseña, solo podemos hacer fuerza bruta con Hydra





```sh fold:"Fuerza bruta con Hydra usuario camilo"
hydra -l camilo -P /usr/share/wordlists/rockyou.txt ssh://172.17.0.2
```

![[Dockerlabs - Vacaciones - Hydra p 22 usuario camilo.png]]

User: camilo  
password: password1


intentamos hacer login por ssh

```sh fold:"ssh acces con camilo como usuario"
ssh camilo@T172.17.0.2
```

acceso con camilo:
![[Dockerlabs - Vacaciones - acceso por ssh usuario camilo.png]]

## escalada de privilegios:
sudo -l
[sudo] password for camilo: 
Sorry, user camilo may not run sudo on 2f317d25df18.


```sh fold:"Revisar si tenemos permiso de escritura en /etc/passwd"
find / -writable -type f 2>/dev/null |grep '/etc/passwd' && ls -lah /etc/passwd
```
No result

```sh fold:"Revisar binarios que se puedan explotar"
find  / -perm -4000 2>/dev/null  
```

No result

Seguimos buscando
find / type f -name "*.txt" todos los ficheros txt:


![[Dockerlabs - Vacaciones - Fichero de correo encontrado.png]]

nos llama la atención este fichero  correo.txt que si tenemos acceso, vamos a abrirlo

![[Dockerlabs - Vacacioens -  Contenido fichero correo.png]]

Contenido:
Hola Camilo,

Me voy de vacaciones y no he terminado el trabajo que me dio el jefe. Por si acaso lo pide, aquí tienes la contraseña: 2k84dicb

Obtenemos una contraseña vamos a probarla con el usuario root:
![[Dockerlabs - Vacaciones - Intento acceso rrot.png]]

Pero hno accedemos
también tenemos el usuario Juan vamos a probar con este usuario:

Ahora is tenemos acceso con el usuario Junan:
![[Dockerlabs - Vacaciones - Acceso usuario Juan.png]]



$ sudo -l
Matching Defaults entries for juan on 2f317d25df18:
    env_reset, mail_badpass, secure_path=/usr/local/sbin\:/usr/local/bin\:/usr/sbin\:/usr/bin\:/sbin\:/bin\:/snap/bin

User juan may run the following commands on 2f317d25df18:
    (ALL) NOPASSWD: /usr/bin/ruby

Buscamos esto en gyfobins:

![[Dockerlabs - Vacacioens -  Gtfobbins ruby sudo access.png]]

ejecutamos este comando
y conseguimos acceso root
![[Dockerlabs - Vacaciones - Root access.png]]


ahora vamos a  eliminar la maquina pulsando Ctrl+C
![[Dockerlabs - Vacacioens -  Eliminar la maquina.png]]

Maquina resuelta completamente


