## SORT
Sirve para poder ordenar informacion dentro de un fichero
diferentes formas de ordenar un fichero

```sh fold:"Ordenar con Sort alfabeticamente"
sort {nombre del fichoer}
```

```sh fold:"Ordenar salida por numeros de  menos a más"
sort -n {nombre del fichoer}
```

```sh fold:"Ordenar salida por numeros de más a menos"
sort -n -r{nombre del fichoer}
```

```sh fold:"Ordenar quitando los repetidos"
sort -u {nombre del fichoer}
```


## HEAD
El comando head es para mostrar un numero determinado de lineas de un fichero

```sh fold:"mostrar las 10 primeras lineas de un fichero"
head {nombre del fichoer}
```



```sh fold:"mostrar las 5 primeras lineas de un fichero"
head -n 5 {nombre del fichoer}
```



```sh fold:"mostrar las 5 primeras lineas de 2 ficheros diferentes"
head -n 2 {nombre del fichoer} {fichero 2}
```


## TAIL
Muestra las ultimas lineas de un fichero 
es = que el comando HEAD pero empezando por abajo
```sh fold:"mostrar las 5 ultimas lineas de un fichero"
tail -n 5 {nombre del fichoer}
```


# Tac
Invirte el contenido de un fichero:
```sh fold:"Invertir contenido de fichero con tac"
tac {nombre del fichero a invertir} > {nombrenuevofichero}
```


# TR
Este comando sirve para aplicar expresiones regulares
```sh fold:"Apliocar expresiones regulares a feciero con tf"
tr -d '' > quitarlosespacios.txt
```

## WC
word count, cuenta el total de lineas de una salida.
cuenta lineas
```sh fold:"cuenta lineas"
cat {nombre del fichoer} | wc -l
```

contar palabras
```sh fold:"cuenta palabras"
cat {nombre del fichoer} | wc -w
```

contar caracteres
```sh fold:"cuenta caracteres de una salida"
cat {nombre del fichoer} | wc -c
```

## UNIQ
Sirve para eliminar salidas repetidas.
Elimina salidas repetidas.
```sh fold:"Eliminar lineas repetidas"
cat {nombre del fichoer} | uniq
```

Elimina linea respetidas y ordena la informacion
```sh fold:"elimina lineas repetidas y ordena la salida"
cat {nombre del fichoer} | uniq | sort
```


combiinacion de varios comandos
```sh fold:"cuenta el total de lineas y elimina lineas repetidas y ordena la salida"
cat {nombre del fichoer} | uniq | sort | wc -l
```