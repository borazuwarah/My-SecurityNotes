Nos sirve para encontrar usuarios validos en SAMBA

## Uso
```sh fold:"rpcclient enumeracion de usuarios"
rpcclient -U "" -N {ipVictima}
```

se nos abre un pront con rpcclinet $>

En este punto hay que conocer 3 comandos

### srvinfo

Nos da un poco de información muy interesante
```sh fold:"srvinfo"
rpcclinet $> srvinfo
```

### querydispinfo

Listado de usuarios validos

```sh fold:"querydispinfo"
rpcclinet $> querydispinfo
```

### enumdomusers

Listado de usuarios validos
```sh fold:"enumdomusers"
rpcclinet $> enumdomusers
```