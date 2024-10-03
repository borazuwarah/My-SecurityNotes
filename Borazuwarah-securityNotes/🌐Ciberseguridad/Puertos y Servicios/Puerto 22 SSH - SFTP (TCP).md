SSH (secure shell) es un protocolo de red seguro que se utiliza para conectarse a un servidor. SSH utiliza una clave privada y una clave pública para autenticar a los usuarios que se conectan a un servidor. SSH también se puede utilizar para transferir archivos de forma segura.

Comando para conectar
```sh fold:"comando para conectar por SSH a un servidor"
ssh {Usuario}@{ip destino} [-p {puerto}]
```

<<<<<<< HEAD
## Conectar por SSH usando un id_rsa

```sh fold:"Conectar por SSH con fichero RSA"
# importante poner permisos 600 al fichero RSA
# chmod 600 id_rsa
ssh -i {fichero con RSA y permisos 600} {nombreDeUsuario}@IP
```

=======
Versiones anteriores a 7.7 son vulnerables a enumeración de usuarios
>>>>>>> 5fc091d03f54d7811dc7e8154016a87ae36f3a83
## Usuarios comunes

## Reconocimiento Nmap
```sh fold:"nmap para reconocimiento enumerar el ssh"
nmap -cSV -p22 {ip}
```

## Reconocimiento de Codename

Cabe destacar que a través de la versión de SSH, también podemos identificar el codename de la distribución que se está ejecutando en el sistema.

Por ejemplo, si la versión del servidor SSH es “**OpenSSH 8.2p1 Ubuntu 4ubuntu0.5**“, podemos determinar que el sistema está ejecutando una distribución de Ubuntu. El número de versión “**4ubuntu0.5**” se refiere a la revisión específica del paquete de SSH en esa distribución de Ubuntu. A partir de esto, podemos identificar el **codename** de la distribución de Ubuntu, que en este caso sería “**Focal**” para Ubuntu 20.04.

Después de aplicar un nmap como se indica enteriormente podemos ver algo como esto:
![[SSH - aplicando nmap para reconocimiento.png]]
El código: OpenSSH 6.6.1p1 Ubuntu 2ubuntu2.13 (ubuntu Linux; protocol 2.0)
lo buscamos en google acompañado de :  launchpad

![[SSH- reconocimiento launchpad.png]]
en la web del primer resultado:

![[SSH - launchpad reconocimiento systema operativo.png]]
## Fuerza bruta

```sh fold:"aplicar fuerza bruta a un servidor SSH"
hydra -l {UsuarioConocido} -P /usr/share/wordlists/rockyou.txt ssh://{ip} -s {port} -t {totalthreads}

# si el ssh está en el 22 no es necesario poner el -s
# -t hilos
```


Codename --> nombre e la versión del LINUX

## Transferencia de ficheros entre Local y Servidor mediante [[SCP]]

**SUBIR FICHEROS **

```sh fold:"scp para subir un fichero al servidor"
scp {nombre archivo} usuario@ip:/{ubicacion}

# rejemplo real
scp secreto.txt root@192.168.140.21:/home/root/Escritorio
```

***DESCARGAR FICHERO DESDE SERVIDOR **

```sh fold:"scp para descargar archivo desde el servidor"
scp {uisuario}@{ip}:{rutal al fichero} {nombreresultantefichero}

# rejemplo real
scp root@192.168.140.21:/home/root/Escritorio/secreto.txt descargado.txt
```

