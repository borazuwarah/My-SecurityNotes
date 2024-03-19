
Gobuster es una herramienta para detectar subdominios y rutas de una web conocida

## instalacion

```sh title:"Instalacion de GOBUSTER"
sudo apt-get install gobuster
```

## instalamos sus  diccionarios:

```sh title:"Instalacion de los diccionarios SECLISTS"
sudo apt-get install seclists
```

## utilizacion
### para sacar rutas post dominio
gobuster dir -u {direccion} -w {diccionario}
sudo gobuster dir -u http://192.168.1.141/ -w /usr/share/wordlists/seclists/Discovery/Web-Content/directory-list-lowercase-2.3-medium.txt 

![[CHE - PEPETHEFORG - Gobuster Data.png]]

### para sacar subdominios
#todo