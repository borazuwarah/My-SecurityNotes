
El tratamiento sirve para estabilizar el acceso, y nos permite usar herramientas correctamente


### paso 1

```sh fold:"tratamiento de la TTY 1, conseguir pront"
script /dev/null -c bash
```

### paso 2
```sh fold:"Tratamiento de la TTY 2"
CTRL + z
```

### paso 3

```sh fold:"Tratamiento de la TTY 3"
stty raw -echo; fg
```


### paso 4

```sh fold:"Tratamiento de la TTY 4"
reset xterm
# es posible que no aparezca en la ventana pero se escribe igualmente
```


### paso 5

```sh fold:"Tratamiento de la TTY 5"
export TERM=xterm
export SHELL=bash
```

se puede probar si funciona usando el comando clear
y con CTRL+C no se pierde la conexión