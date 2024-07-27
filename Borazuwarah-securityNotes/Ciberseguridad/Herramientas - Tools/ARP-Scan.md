herramienta de red utilizada para descubrir y enumerar dispositivos en una red local. ARP (Address Resolution Protocol) se utiliza para mapear direcciones IP a direcciones MAC (Media Access Control) en una red local. `arp-scan` envía paquetes ARP a todas las direcciones IP dentro de un rango especificado y muestra las respuestas, permitiendo identificar los dispositivos activos en la red.

### arp-scan
primero debemos conocer cual es nuestra interfaz:

```sh fold:"comando ifconfig"
ifconfig
```


```sh fold:"comando arp-scan"
sudo arp-scan -I {eth0} --localnet
```

`arp-scan -I {interfaz de red} --localnet` {eth0}
>  `arp-scan -I etho --localnet` 
>  ![[arp-scan.png]]