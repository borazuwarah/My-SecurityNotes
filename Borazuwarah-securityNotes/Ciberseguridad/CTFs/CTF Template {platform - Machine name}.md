
# Reconocimiento (Arp-scan / netdiscover / nmap / fping )



## arp-scan
### commando

```sh title:"comando arp scan en shell"
sudo arp-scan -I eth0 --localnet
```

### Cosas encontradas (resultado)

### Notas


## Netdiscover

```sh title:"comando netdiscover en shell"
sudo netdiscover -io eth0 -r 192.168.1.0/24
```



### Cosas encontradas (resultado)

### Notas


## Nmap

```sh fold:"comando nmap para descubrir dispositivos en la red en shell"
sudo nmap -sn 192.168.1.0/24
```


### Cosas encontradas (resultado)

### Notas


## fping para saber si una maquina está activa o no

```sh fold:"comando fping para descubrir dispositivos en la red en shell"
sudo fping -e {ip/nombre de la maquina}
```


## Ping

```sh fold:"comando nmap para descubrir dispositivos en la red en shell"
ping -c1 {ip destino}
```


### Cosas encontradas (resultado)

### Notas


>[!INFO]
> ttl --> 128 Máquina Windows
>ttl --> 64 Máquina Linux


## Whatweb
Herramienta que extrae informacion de una web  (Reconocimiento)


![[Webs#whatweb#forma de usar]]
### Cosas encontradas (resultado)

### Notas


# Puertos abiertos encontrados

## puerto XX servicio version



# Explotación

# Esplicación de la explotacion

# Escalada de privilegios
## Enumeracion basica sistema
