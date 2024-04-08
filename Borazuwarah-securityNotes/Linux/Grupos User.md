Los grupos son grupos de usuarios dentro del sistema Linux
dentro del ls -la son es el segundo grupo


## crear grupo

```sh fold:"Crea un grupo de usuarios"
sudo addgroup {nombre grupo} 
```

## Listar grupos

```sh fold:"Listar los grupos creados en el sistema"
sudo getent group
```

listar los usuarios de un grupo
```sh fold:"Listar los usuarios de un grupo"
sudo getent group {nombre del grupo}
```
## Agregar un usuario a un grupo
```sh fold:"Agregar un usuario a un grupo"
sudo usermod -aG {nombregrupo} {nombreusuario}
```

chown
cambiar  el propietario del grupo a un archivo
```sh fold:"Listar los grupos creados en el sistema"
sudo chowns {propietario archivo:grupo} {archivo a cambiar el propietario del grupo}
```

## eliminar grupo
```sh fold:"Eliminar un grupo"
sudo groupdel {nombre del grupo}
```