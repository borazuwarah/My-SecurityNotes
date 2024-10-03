Protocolo de transferencia de archivos, Por la red TCP, basado en arquitectura cliente- servidor. Desde un equipo cliente se puede conectar a un servidor para descargar archivos desde él o para enviar archivos.


usuarios:
anunymous:
anon: anon


![[FTP Anom.png]]
anonymous connection:
![[FTP Anonimous connection.png]]

## Nmap para reconocimiento con scripts
```sh fold:"Reconocimiento con scripts"
sudo nmap -sCV -p21 {ip}
```


```sh fold:"Reconocimiento con scripts"
sudo nmap --script ftp-anom -p21 {ip}
```
si el usuario anonymous está habilitado la password es intro

## Fuerza bruta a FTP con hydra

```sh fold:"fuerza bruta a FTP con hydra"
hydra -l {usuario} -P /usr/share ftp://{ip} -t 15
```