
Gobuster es una herramienta para detectar subdominios y rutas de una web conocida

## instalacion
sudo apt-getr install gobuster
## instalamos sus  diccionarios:
apt-get install seclists

## utilizacion

gobuster dir -u {direccion} -w {diccionario}
sudo gobuster dir -u http://192.168.1.141/ -w /usr/share/wordlists/seclists/Discovery/Web-Content/directory-list-lowercase-2.3-medium.txt 

![[CHE - PEPETHEFORG - Gobuster Data.png]]