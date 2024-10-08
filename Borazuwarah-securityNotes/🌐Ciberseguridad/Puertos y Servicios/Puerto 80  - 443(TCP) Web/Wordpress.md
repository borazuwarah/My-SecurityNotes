


WordPress es un CMS de código abierto muy popular que fue lanzado en 2003. Es utilizado por millones de sitios web en todo el mundo y se destaca por su facilidad de uso y flexibilidad. Con WordPress, los usuarios pueden crear y personalizar sitios web sin necesidad de conocimientos de programación avanzados. Además, cuenta con una amplia variedad de plantillas y plugins que permiten añadir funcionalidades adicionales al sitio.

Herramientas
- [[WPScan (wordpress)]]
- [[WPSeku (Wordpress)]]
- [[Wordpresscan (Wordpress)]]
- [[Curl]]



Asimismo, otro de los recursos que contemplamos en esta clase es el archivo **xmlrpc.php**. Este archivo es una característica de WordPress que permite la comunicación entre el sitio web y aplicaciones externas utilizando el protocolo **XML-RPC**.

El archivo xmlrpc.php es utilizado por muchos plugins y aplicaciones móviles de WordPress para interactuar con el sitio web y realizar diversas tareas, como publicar contenido, actualizar el sitio y obtener información.

Sin embargo, este archivo también puede ser abusado por atacantes malintencionados para aplicar **fuerza bruta** y descubrir **credenciales válidas** de los usuarios del sitio. Esto se debe a que xmlrpc.php permite a los atacantes realizar un número ilimitado de solicitudes de inicio de sesión sin ser bloqueados, lo que hace que la ejecución de un ataque de fuerza bruta sea relativamente sencilla.


## Abuso de xmlrpc.php
De esta forma podemos enumerar los metodos disponibles en Wordpress

Primero comprobar que existe
```sh fold:"comprobar que exite xmlrpc.php"
# en el navegador
{dominio}/xmlrpc.php

# Existe si la respuesta es algo así:
# XML-RPC server accepts POST requests only.
```


por tanto ahora vamos a lanzar la petición por POST

```sh fold:"peticion por POST a xmlrpc.php"
curl -s -X POST {dominio}/xmlrpc.php
# si dice algo como parse error. not well formedds es porque falta una estructura en xml

´#se le puede pasar a través de un fichero:
# copiamos esto en un fichero data.xml:
# <?xml version="1.0" encoding="utf-8"?> 
# <methodCall> 
# <methodName>system.listMethods</methodName> 
# <params></params> 
# </methodCall>

# y se lo pasamos  por curl
curl -s -X POST {dominio}/xmlrpc.php  -d@file.xml


# el server contestará con todos los metodos disponibles
# el mas interesante e  getUsersBlogs 
# con este metodo se podría intentar hacer login o fuerza bruta


```
