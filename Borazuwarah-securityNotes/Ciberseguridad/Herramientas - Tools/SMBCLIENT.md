Smbclient es otra herramienta de línea de comandos utilizada para interactuar con servidores SMB y Samba, pero a diferencia de smbmap que se utiliza principalmente para enumeración, smbclient proporciona una interfaz de línea de comandos para interactuar con los recursos compartidos SMB y Samba, lo que permite la descarga y subida de archivos, la ejecución de comandos remotos, la navegación por el sistema de archivos remoto, entre otras funcionalidades.

En cuanto a los parámetros más comunes de smbclient, algunos de ellos son:

- **-L**: Este parámetro se utiliza para enumerar los recursos compartidos disponibles en el servidor SMB o Samba.
- **-U**: Este parámetro se utiliza para especificar el nombre de usuario y la contraseña utilizados para la autenticación con el servidor SMB o Samba.
- **-c**: Este parámetro se utiliza para especificar un comando que se ejecutará en el servidor SMB o Samba.


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

## Conexión con SMBCLIENT

```sh fold:"smbclient conectar conociendo usuario y contraseña"
smbclient -L //{ip} -U '{usuario}'
```


## Usar un recurso compartido

```sh fold:"smbclient uso de recurso compartido"
smbclient  -U '{usuario}' //{IP}/{recursoCOmpartidoName}
```