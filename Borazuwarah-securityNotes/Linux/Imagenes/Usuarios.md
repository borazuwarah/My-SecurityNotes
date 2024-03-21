Creacion y eliminacion de usuarios en Linux

Crear un usuario

## useradd - Crear un usuario

```sh fold:"Comando adduser para crear un usuario "
sudo adduser  {nombreusuario}
```
luego pasa por un formulaqrio con el resto de propiedades del usuario

para cambiar de un usuario a otro usamos el comando:
##  su - cambiar de usuario

```sh fold:"coamndo su para cambiar de Usuario "
su  {nombreUsuario}
```

## Whoami - Conocer el usuario con el que estoy logueado
Conocer que usuario somos:

```sh fold:"comando whoami "
whoami
```

## deluser
```sh fold:"comando para eliminar un usuario"
deluser --remove-home {nombreusuario}
```