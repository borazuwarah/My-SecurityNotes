plataforma: https://dockerlabs.es/#/
Mirror: https://mega.nz/file/ic9VwYZJ#Hr1BjW2axoSRmUYbxhldmTNiYtBV9TQU83JDJPpoYww
Nombre: HedgeHog
Dificultad: muy fácil
Creador: AnkbNikas



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

# Explotación

# Escalada de privilegios