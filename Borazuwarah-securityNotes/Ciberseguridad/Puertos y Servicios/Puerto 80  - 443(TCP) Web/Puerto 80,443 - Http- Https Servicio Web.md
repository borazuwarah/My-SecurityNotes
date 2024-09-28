#puerto80

Protocolo de transferencia de hipertexto es el protocolo de comunicación que permite las transferencias de información a través de archivos en la web.

## Enumeraciones y herramientas
- Whatweb
- Wapalizer
- Web discovery
- comprobar ficheros interesantes
	- robots.txt
	- sitemap.xml
	- web.config
	- crossdomain.xml
	- Nuclei
- Fuerza bruta a directorios
	- [[Gobuster]]
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

Es una herramienta que no viene con Kali preinstalada, y sirve para realizar escaneo y detección de vulnerabilidades para aplicaciones y servicios web, con la instalación también instala diccionarios y plantillas para trabajar correctamente.

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


# Métodos Http

	Listar usamos  --> Get
	Enviar Datos --> POST
	Modifucar datos -->PUT
	Borrar datos --> Delete
## Metodos especiales

Metodos Options  Sirve para saber con que metodos puedes pedir recursos
Metodo Head Lee las cabeceras de respuesta


## Cabeceras en solicitudes HTTP

Las cabeceras que incluimos en las request para hacer peticiones al servidor
Host: indica el host al que conectamos
User-Agent: Especifica al servidor desde que dispositivo se conecta al servidor
Accept: que tipo de contenido aceptamos en el servidor
Content-Type: especificamos el tipo de dato que estamo enviando
Authority: Credenciales encodeadas (Permisos)
Cookie: Cookie, indica al servidor donde está almacenada la info del usuario con el que estas conectado

## Body

Datos que mandamos o recibimos del servidor

## Códigos de estado HTTP (Respuesta)

- 100  --> Continue
- 101  --> switching protocols
- 102  --> processing
- 103  --> Early hints
- 200  --> OK (respuesta exitosa)
- 201  --> OK Created
- 202  --> OK Accepted
- 204  --> OK NOn authoratative information
- 204  --> OK N content
- 205  --> OK Reset content
- 206  --> OK Partial content
- 300  --> Redirection Multiple choices
- 301  --> Redirection Moved permanetly
- 302  --> Temporarily moved 
- 303  --> See other
- 304  --> Not modified
- 307  --> Temporary Redirect
- 308  --> Permanet redirect
- 400  --> Bad request
- 401  --> Unauthorized
- 402  --> Payment required
- 403  --> Forbiden
- 404  --> Not found
- 414  --> Request URL too long
- 429  --> Too many requests
- 500  --> Internal Server Error
- 501  -->  Not implemented
- 502  --> Bad Gateway
- 503  --> Service Unavailable
- 504  --> Gateway Timeout
- 505 --> HTTP Version not supported
- 511  --> Network Authentication required

## Cabecera de la respuesta

Server: ver que tipo de servidor está funcionando (incluido versión)
X-Power-By: version de lenguaje del server
Location:  si hay un redirect (destino)
Content-Type: El tipo de contenido que te devuelve
Set-Cookie: Establece la cookie en el navegador

## Body response

Es el contenido que estamos buscando de la web

## HTTPS
HTTPS es de Security, los datos van cifrados y aunque se  capturen los datos no se podrán descifrar

Un servidor puede trabajar con un certificado SSL y por tanto usar el protocolo HTTPS

## Cookies HTTP
Las cookies son pequeños fragmentos de datos que nos envía el servidor web a nuestro navegador para que lo almcenemos de forma temporal o permanente

Usos:
- Autenticación --> encargadas de giestionar las sesiones del usuario 
- Seguimiento / Personalización --> personalización de la web
- cookies de carritos de compra --> Guarda los articulos de una compra
-

Existen diferentes  tipos de cookies:
- Cookies de Sesion --> almacenan en el navegador y a la hora de cerrar el navegador se cierran
- Cookies persistentes --> Permanecen en el dispositivo hasta que manualmente se eliminan
- Cookies de terceros --> Sirven para rastrear tu perfil

