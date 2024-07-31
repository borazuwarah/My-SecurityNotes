Viene instalada en Kali

## Instalación

## Enumeración de recursos

```sh fold:"smbclient enumeracion"
smbmap -H {ip} -u '{usuario}' -p '{password}'
# -N para intentar con null sesion
```

### ejemplo de salida:
![[SMBMAP salida.png]]