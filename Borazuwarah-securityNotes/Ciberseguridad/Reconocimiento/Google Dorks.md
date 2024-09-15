Filtros que permiten realizar  Busquedas avanzadas

Herramienta para Dorks de google: https://pentest-tools.com/ para generar Dorks de forma automática
almacen de vulnerabilidades: https://www.exploit-db.com/

La herramienta searchExploit (de consola) usa esta web como fuente de datos


aqui meustra algunos
```sh fold:"Fijar la busqueda en una web"
site:{dominio}

# que solo muestre de tipo de archivo txt
filetype.txt

#de las respuestas encontradas que en el texto tenga este texto:
intext:{texto}

# buscar ficheros de wordpress criticos
inurl:wp-config.php.txt
```
