
**Docker Compose** es una herramienta que facilita la definición y el manejo de aplicaciones **Docker** que involucran múltiples contenedores. Con Docker Compose, puedes definir una arquitectura de aplicación con múltiples servicios (contenedores) en un archivo YAML y luego, con un solo comando, iniciar todos esos contenedores y configurar su comunicación y configuración.

### Funcionalidades clave de Docker Compose:

1. **Definición en un archivo YAML**: Puedes definir todos los servicios de una aplicación (contenedores) en un archivo llamado `docker-compose.yml`. En este archivo se especifican cosas como:
    
    - La imagen de Docker que debe usar cada servicio.
    - Los volúmenes y redes que deben compartirse entre los contenedores.
    - Las variables de entorno y otras configuraciones de cada servicio.
2. **Orquestación de múltiples contenedores**: Si tu aplicación requiere, por ejemplo, un servidor web, una base de datos y un servicio de cacheo (como Redis), puedes ejecutar y gestionar todos estos contenedores como un solo conjunto. Docker Compose se encarga de levantar todos los servicios con un solo comando.
    
3. **Redes y Volúmenes**: Docker Compose facilita la creación de redes y volúmenes compartidos entre los contenedores, lo que permite que los contenedores se comuniquen fácilmente entre sí.
    
4. **Comandos principales**:
    
    - `docker-compose up`: Levanta y ejecuta todos los contenedores definidos en el archivo `docker-compose.yml`.
    - `docker-compose down`: Detiene y elimina los contenedores y redes creados por `docker-compose up`.
    - `docker-compose logs`: Muestra los logs de todos los servicios.
- 
```sh fold:"docker-compose.yml"
version: '3' 
services: 
	web: 
		image: nginx 
		ports: 
			- "80:80" 
		database: 
			image: mysql 
			environment: 
				MYSQL_ROOT_PASSWORD: example
```

**AVISO**: En caso de que veáis que no estáis pudiendo instalar ‘**nano**‘ o alguna utilidad en el contenedor, eliminad todo el contenido del archivo ‘**/etc/apt/sources.list**‘ existente en el CONTENEDOR y metedle esta línea:

- **deb http://archive.debian.org/debian/ jessie contrib main non-free**
    

Posteriormente, haced un ‘**apt update**‘ y probad a instalar nuevamente la herramienta que queráis, ya no os debería de dar problemas.

Si estáis enfrentando dificultades con el contenedor de Elasticsearch y notáis que el contenedor no se crea después de ejecutar ‘**docker-compose up -d**‘, intentad modificar un parámetro del sistema con el siguiente comando en la consola:

- **sudo sysctl -w vm.max_map_count=262144**‘.

Después de hacerlo, intentad de nuevo ejecutar ‘**docker-compose up -d**‘, se debería solucionar el problema.

A continuación, os proporcionamos el enlace al proyecto de Github que estamos usando para esta clase:

- **Vulhub**: [https://github.com/vulhub/vulhub](https://github.com/vulhub/vulhub)

Asimismo, por aquí os compartimos el enlace al recurso donde se nos ofrece el script en Javascript encargado de establecer la Reverse Shell:

- **NodeJS Reverse Shell**: [https://github.com/appsecco/vulnerable-apps/tree/master/node-reverse-shell](https://github.com/appsecco/vulnerable-apps/tree/master/node-reverse-shell)

para agregarlo sería con 
```sh fold:"agregar el docker compose"
docker -compose up -d
# Esto va a 
```