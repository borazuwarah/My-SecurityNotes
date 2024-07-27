Consiste en modificar la entrada dela consulta SQL a la BD para obtener datos diferentes y de esta forma poder extraer información de la BD la cual no se mostraría de forma normal.



Como comprobar si una entrada de datos es vulnerable a SQL -Injection

en el usuario se podría poner 
admin
Consulta
```sh fold:"consilta SQL-Injection"
Select * from users Where username ='admin'--' AND password ='password' '

# -- comentario SQL
```

Si la aplicación es vulenrable a SQL los datos que el usuario mete se convierte en parte de la consulta


hay 3 Tipos de Injeciones SQL
## Inyección SQL - Clásica - Classic SQL Injection
El atacante utiliza el mismo canal de comunicación para lanzar su ataque y obtener sus resultados.
- Facil de explotar


Hay 2 subtipos
### Injection SQL basadas en Error
En este caso el provoca errores en la BD de datos para obtener información útil por ejemplo
	- Version de la BD
	- Typo DB
	- Consulta que se está usando
Con esta información podríamos hacer consultas Más especificas y no basadas en error

### Injectiocciones SQL Basadas en UNION
Esta tecnica aprovecha el operador SQL Union  que conecta 2 salidas de datos en una sola.
Utiliza el operador SQL UNION para combinar el resultado de dos consutas en un solo conjunto de resultados.ejemplo:
www.ejemplo.com/web.php?id='UNION SELECT username, password FROM users'

De esta forma se rompe la consulta inicial, y uniremos 2 conjuntos de datos, el usuario y contraseña de la tabla users..
Para que esto funciona requiere 2 requisitos:
1 Conocer las columnas en la BD
> **Metodo 1** Consiste en inyectar una serie de clausulas ORDER BY que ordena las columnas en base al numero que se le indique
> Order by1,
> Order by 2
> order by 3
> Esto modifica la salida original para ordenar los resultados en diferentes columnas, cuando  este indice exceda el numero de comunas existente mostrará un error.
> 

>Método 2 Enviar una serie de cargas útiles que especifiquen un numero de valores nulos.
>Union select null --
>Union select null, null--
>union select null, null, null --
Si el número de nulos no corresponde con el número de columnas devolverá un error con el cual podremos detectar cuantas columnas existen en la tabla

2 Conocer el tipo de dato que hay en cada columna
>para comprobar el tipo de dato se debe realizar prueba con cada una de las columnas para proba el tipo de dato que contienen las mismas:
>UNION SELECT 's', NULL, NULL--
>UNION SELECT NULL, 's', NULL --
>UNION SELECT NULL, NULL, 's' --
Se inyecta un string con el caracter 's', en cada una de las columnas, si el tipo de dato de la columna no coincide con el tipo de dato del valor inyectado, la base de datos devolver'a un error de conversación de tipos de datos.



## Injection SQL a Ciegas (Blind SQL)
Surge cuando una apliacion es vulnerabae a ineyeccion SQL pero sus respuestas HTTP no contienen los resultados de la consulta relevante ni los detalles de ning'un error de la base de datos.


### SQLInjection boolenao (Verdadero / Falso)
se envian peticiones que la respuesta es erdadera o Falsa (en web si la web crga o muestra error)
>Cookie_session: TrackId=abc123
>Cuando TrackId procesa una solicitud que contiene la cookie, la aplicación determinará si se trata de un usuario conocido ejecutando por detrás una secuencia parecida a esta:
>SELECT TrackID FROM users WHERE TrackID = abc123

>UNION SELECT 's' WHERE 1=1 --
>UNION SELECT 's' WHERE 1=2 --
El primero de los valores 1=1 siempre es correcto por lo que la condicion inyectada será verdadera y mostrará el mensaje "bienvenido", por lo contrario el segundo valor devolverá falso, por lo que no se mostrará ningún mensaje.


### SQL basado en tiempo
en este tipo de ataques se envian consultas SQL que resultan en diferentes tipos de respuesta dependiendo de si es verdad o falso 
en SQL se suele poner un sleep en la respuesta
Se realiza activando retardos en el tiempo condicionales. Si retrasamos la ejecución de la consulta también retrasará la respuesta, por lo que estaremos frente a un SQL INJECTION  basado en tiempo.

En caso de MYSQL podríamos activar un retraso de la siguiente forma:

>id' AND IF(SUBSTRING(password, 1,1)>'m', SLEEP(5),0) --
>Si la aplicacion se retrasa 5 segunos , el primer caracter del campo contraseña es mayor que 'm'. Si no se retrasa, es meno o igual a 'm', Así sucesivamente hasta encontrar el valor total de la contraseña.


## Injection SQL OOUT-OF-BAND
Solo se puede llevar a cabo si ciertas configuracione estánm activas en la BD, consiste en  lanzar peticiones a la BD y enviar la respuesta a otro canal indicado  (canal del atacante)
LSe basa en la capacidad de la DB para realizar conexiones de red a servidores externos. Para que funcione ciertas funcionalidades de la BD debe estar habilitados.