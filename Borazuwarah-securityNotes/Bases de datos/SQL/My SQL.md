## Instalacion de Mysql


## Servicio de Mysql

sudo service mysql status
sudo service mysql start
sudo service mysql stop


## Conectar a Mysql
sudo mysql --> conexion local

## crear base de datos
create database nombre;

## Listar bases de datis

show databases;

## Borrar base de datos

drop database nombrebasedatos;

# Usar base de datos
 use nombrebasedatos;

# Listar tablas
show tables
# crear tabla (create table)
create table
ejemplos:
reate table user (id int not null auto_increment, nombre varchar(255), apellido varchar(255), password varchar(255), primary key (id));

## Insertar datos (insert)
Insert into
Ejemplos:
insert into user(nombre, apellido, password) value ("Beatriz", "Diza", "Contrasenia");

## Leer / consultar datos (select)
select
ejemplos
select * from user;

## Modificar ASctualizar datos (update)
Update basedatos columnaquequiero set nuevovalor
ejemplos
update user set password="NuevaContraseña"

## borrar eliminar datos (delete)
delete
ejemplos
delete from user where Apellido ="Fajardo";

## filtrar consultas (where)
where
ejemplos
select * from user where password="viejoFraile";
usando varios where:
select * from user where password="NuevaContraseña" || nombre="Jose";

se puede combinar con:
select delete o update

## Order by (ordenar por)
order by
sirve para ordenar la salida 
select * from user order by id asc
select * from user order by nombre;

también podemos pasarle el numero de columna para que ordene
select * from user order by 1;
select * from user order by 2;

## limit limitar resultados
limit x --> x es el total de rows que se van amostrar
select * from user order by 1 limit 2;

## Union (unir salida de 2 consultas)
union 
une varias consultas, importante tener en cuneta que la cantidad de columnas de todas las consultas debe de ser la misma
ejemplos:
select * from user where id ='5' union select 1,2,3,4;









