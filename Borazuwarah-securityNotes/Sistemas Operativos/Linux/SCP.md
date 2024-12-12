El comando **`scp`** (Secure Copy) en Linux se utiliza para copiar archivos y directorios de manera segura entre diferentes sistemas a través de la red, utilizando el protocolo **SSH** (Secure Shell) para garantizar que la transferencia esté cifrada.

Ejemplos:

 Copiar un archivo de un sistema local a un remoto: (SUBIDA)
   `scp archivo.txt usuario@192.168.1.10:/ruta/destino/`


```sh fold:" Copiar un archivo de un sistema local a un remoto"
scp archivo.txt usuario@192.168.1.10:/ruta/destino/
```
 
 
 Copiar un archivo desde un sistema remoto al sistema local (DESCARGA)
`scp archivo.txt usuario@192.168.1.10:/ruta/destino/`

```sh fold:"Copiar un archivo desde un sistema remoto al sistema local"
scp usuario@192.168.1.10:/ruta/archivo.txt /ruta/local/
```