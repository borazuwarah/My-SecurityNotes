SSH es un protocolo de red seguro que se utiliza para conectarse a un servidor. SSH utiliza una clave privada y una clave pública para autenticar a los usuarios que se conectan a un servidor. SSH también se puede utilizar para transferir archivos de forma segura.

Comando para conectar
```sh fold:"comando para conectar por SSH a un servidor"
ssh {Usuario}@{ip destino} [-p {puerto}]
```

## Conectar por SSH usando un id_rsa

```sh fold:"Conectar por SSH con fichero RSA"
# importante poner permisos 600 al fichero RSA
# chmod 600 id_rsa
ssh -i {fichero con RSA y permisos 600} {nombreDeUsuario}@IP
```

## Usuarios comunes
## Fuerza bruta

Versiones anteriores a 7.7 son vulnerables a enumeración de usuarios


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

