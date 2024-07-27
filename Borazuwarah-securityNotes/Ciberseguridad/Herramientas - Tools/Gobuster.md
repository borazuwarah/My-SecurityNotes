
Gobuster es una herramienta para detectar subdominios y rutas de una web conocida

## Dirbuster (diccionarios)
Para  escanear webs se suele usar los diccionarios de dirbuster

```sh title:"Instalacion de diccionarios para escaneos web"
sudo apt install dirbuster
```



## instalacion

```sh title:"Instalacion de GOBUSTER"
sudo apt-get install gobuster
```

## instalamos sus  diccionarios:

```sh title:"Instalacion de los diccionarios SECLISTS"
sudo apt-get install seclists
```

## utilización
### para sacar rutas post dominio
gobuster dir -u {direccion} -w {diccionario}
sudo gobuster dir -u http://192.168.1.141/ -w /usr/share/wordlists/seclists/Discovery/Web-Content/directory-list-lowercase-2.3-medium.txt 

```sh title:"uso de gobuster para directorios"
gobuster dir -w /usr/share/dirbuster/wordlists/directory-list-2.3-medium.txt -u http://{ip} --add-slash
```
![[CHE - PEPETHEFORG - Gobuster Data.png]]

### para sacar subdominios
#todo