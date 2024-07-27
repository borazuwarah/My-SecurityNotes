#puerto80
Protocolo de transferencia de hipertexto es el protocolo de comunicación que permiete las transferencias de información a través de archivos en la web.

## Enumeraciones y herramientas
- Whatweb
- Wapalizer
- Web discovery
- comprobar ficheros interesantes
	- robots.txt
	- sitemap.xml
	- web.config
	- crossdomain.xml
- Fuerza bruta a directorios
	- gobuster
	- dirsearch
	- wfuzz
	- ffuf
	- Nikto
- Woredpress
	- wpscan



# WPScan

## Enumerar plugings
```sh fold:"Enumerar plugings de wordpress"
wpscan --url {web destino}
```



# Nuclei

Es una herramienta que no viene con Kali preinstalada, y sirve para realizar escaneo y deteccion de vulnerabilidades para aplicaciones y servicios web, con la instalacion tambien instala diccionarios y plantillas para trabajar correctamente.

## instalacion de nuclei

```sh fold:"instalacion de nuclei"
sudo apt install nuclei
```

## Enumeracion de plugins instalados en wordpress con nuclei

```sh fold:"Enumerar los plugings isntalados  en wordpress"
nuclei -u {web destino} -itags fuzz -t /home/user/.local/nuclei-templates/fuzzing/wordpress-plugings-detect.yaml
```

## Enumerar plugings isntaleos en wordpress con nmap
```sh fold:"Enumerar los plugings isntalados  en wordpress con nmap"
nmap -p80 --scrip hhtp-wordpress-enum --script-args hht-wordpress-enum.rot='{path al wordpress}', search-limit=1000 {dominio/ip}
```

# Enumerar plugings instalados en wordpress con gobuster

```sh fold:"Enumerar los plugings isntalados  en wordpress con nmap"
gobuster dir -u {url} -w /usr/share/seclists/Discovery/web-content/CMS/wp-plugings.fuzz.txt
```