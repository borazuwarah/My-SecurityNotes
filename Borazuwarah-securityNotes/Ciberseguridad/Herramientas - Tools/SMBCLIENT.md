Instalada por defecto en Kali


## Instalación


## Enumeración sin usuario ni contraseña

```sh fold:"smbclient enumeracion"
smbclient -L {ip_target} -N
# -N para intentar con null sesion
```


## Aplicar fuerza bruta con hydra

```sh fold:"smbclient aplicar fuerza bruta"
hydra -l {UserName} -P /usr/share/wordlists/rockyou.txt smb://{IP}
```

## Conexión con SMBCLINET

```sh fold:"smbclient conectar conociendo usuario y contraseña"
smbclient -L //{ip} -U '{usuario}'
```


## Usar un recurso compartido

```sh fold:"smbclient uso de recurso compartido"
smbclient  -U '{usuario}' //{IP}/{recursoCOmpartidoName}
```