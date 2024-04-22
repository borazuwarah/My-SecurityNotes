metaesploit es una herramienta muy potente que permite explotar vulneravilibidades conocidas en una maquina



## arrancar metasploit
Menu Inicio / metasplot (de esta forma se actualizan las Bases de datos de metaesploit)


## search {vulnerabilidad}

```sh title:"buscar vulnerabilidad"
msf6 > search {eternalblue}
msf6 > search {CVE-2017-0143}
# la bulnerabilidad nos la da el scrip de NMP
# podemos poner e CVE
# podemos poner el servico y la version que hemos sacado de nmap
```

## cargar un exploit
```sh title:"metasploit, cargar un exploit tras encontrarlo con serach"
msf6 > use {numero del exploit}
	# El numero depende de la Lista que nos saque metasploit con el search
```


## show options
se muestran 2 apartados 
	> Module options --> forma de configurar el exploit
	> Payload Options --> se ejecuta una vez el exploit ha conseguid acceso a la maquina (tambien puede ser configurable)
```sh title:"metasploit, Ver los parametros de configuracion para el exploit seleccionado"
msf6 exploit({exploti seleccionado}) > show options 
	# Veremos las diferentes opciones para cada exploit , si es required o no
	###### ALGUNAS OPCIONES
	# RHOSTS IP de la maquina victima
	# RPORT remote port
	# LHOST local IP
	# LPORT puerto local
```

## payload

El payload es lo que se va a ejecutar cuando el exploit consiga acceso a la maquina


## Configurar parametros del exploit

```sh title:"metasploit, configurar parametros"
msf6 exploit({exploti seleccionado})> set {parametroname} [parametro valor] 
	# ejemplos:
	msf6 exploit({exploti seleccionado})> set RHOSTS 192.168.1.199
```

## Ejecutar
una vez todo esté configurado lo ejecutamos

```sh title:"metasploit, ejecutar metasploit"
msf6 exploit({exploti seleccionado})> run
```

```sh title:"metasploit, ejecutar metasploit"
msf6 exploit({exploti seleccionado})> exploit
```