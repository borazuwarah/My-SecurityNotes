aqui vamos a poner todas las herramientas interesantes para la explotación de webs

# whatweb

Herramienta que extrae informacion de una web (plugings instalados versiones, tecnología, versiones de la tecnología...)

## forma de usar:


```sh fold:"comando whatweb para reconocimiento de webs"
sudo whatweb -v -a {ip destino}
```



# WFUZZ

## instalacion

```sh fold:"Instalacion de wfuzz"
sudo apt install wfuzz
```

## forma de usar:

```sh fold:"encontrar directorios ocultos en una web"
sudo wfuzz -c --hc 404 -t 200 -w /usr/share/wordlists/dirbuster/directory-list-low-ercase-2.3-medium.txt -u {direccionweb}/FUZZ


# Options
-c
--hc 404 ocultar los intentos fallidos
-t 200 --> 200 hilos
-w diccionario 
-u objetivo (url)
-H host a buscar
```


```sh fold:"encontrar subdominios en una web"
sudo wfuzz -c --hc 404 -t 200 -w /usr/share/wordlists/dirbuster/directory-list-low-ercase-2.3-medium.txt -u {dominioweb} -H "Host: FUZZ.{dominio}"


# Options
-c
--hc 404 ocultar los intentos fallidos
-t 200 --> 200 hilos
-w diccionario 
-u objetivo (url)

```


```sh fold:"encontrar subdominios en una web - ocultando la respuesta con 546 Lineas"
sudo wfuzz -c --hc 404 -t 200  --hl 546 -w /usr/share/wordlists/dirbuster/directory-list-low-ercase-2.3-medium.txt -u {dominioweb} -H "Host: FUZZ.{dominio}"


# Options
-c
--hc 404 ocultar los intentos fallidos
-t 200 --> 200 hilos
--hl hide line //oculta linea
-w diccionario 
-u objetivo (url)
-H host a buscar
```


# gobuster

es una herramienta para conocer directorios o subdominios de una web
## uso
```sh fold:"gobuster para encontrar directorio"
gobuster dir -u {url} -w /usr/share/wordlists/SecLists/Dicosvery/Web-Content/direcotyr-list-lowercase-2.3-medium.txt

-u {url/IP}
-w diccionario a usar
```

# dirb
es una herramienta para encontrar direcotiro de una web

```sh fold:"dirb sirbe para encontrar directorios en una web"
dirb {url / IP}

```


# whois
informacion sobre un dominio
se puede hacer online  a través de alguna web o se puede usar desde el sistema
## instalacion
```sh fold:"Instalacion de wfuzz"
sudo apt install whois
```
## uso
```sh fold:"whois dominio / Ip"
sudo whois {dominio}
sudo whois {ip}
```