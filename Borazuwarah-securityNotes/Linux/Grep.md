El comando grep sirve para buscar dentro del terminal

Buscar X dentro de un archivo
```sh fold:"Buscar texto en un fichero"
grep {texto a buscar} /ruta/al/fichero
```


buscar 2 poatrones
```sh fold:"Buscar con 2 patrones"
grep -E 'texto1|texto2' /ruta/al/fichero
```


buscar en todos los archivos del escritorio una palabra
```sh fold:"buscar en todos los archivos del escritorio una palabra"
cd Desktop
grep {texto a buscar} *
```

buscar solo en ficheros
```sh fold:"buscar en todos los archivos del escritorio una palabra buscando solo en ficheros"
cd Desktop
grep -s {texto a buscar} *
```

Eliminar una linea donde encuentre un patron
```sh fold:"buscar todo menos lo del texto"
cd Desktop
grep -v {texto a buscar/obviar} ruta/al/fichero
```

```sh fold:"buscar en todos los archivos del escritorio una palabra varias palabras"
grep -v -E 'texto1|texto2|texto3' /ruta/al/feichero
```