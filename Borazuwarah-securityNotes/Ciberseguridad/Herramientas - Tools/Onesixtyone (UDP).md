oficial web: [onesixtyone | Kali Linux Tools](https://www.kali.org/tools/onesixtyone/)
Escaner SNMP con el que se pueden encontrar recursos y usuarios
## Instalación
``


```sh fold:"Instalacion OnesixtyOne"
sudo apt install onesixtyone
```

## Uso
Conseguir la clave de comunidad

```sh fold:"onesixtyone"
onesixtyone -c /usr/share/wordlists/rockyou.txt {IP_Victima}
```
