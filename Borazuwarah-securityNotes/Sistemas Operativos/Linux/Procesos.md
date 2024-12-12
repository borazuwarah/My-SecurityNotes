Los procesos dentro de linux

htop
jobs


si ejecutamos un programa directamente con el nombre, se ejecuta en primer plano

para ejecutarlo en segudno plano  usamos &
```sh fold:"ejecutar firefox en segundo plano "
sudo firefox &
```

comando jobs
puedes ver que procesos están correindo en segundo plano

con el comando fg podemos pasar de segundo plano a primer plano

con CTRL+ Z  ponemos el proceso en Detenido
con el comando bg pasa de Pausa a segundo plano

sii quiero pasar de segundo a primer plano 
fg %{identificador del proceso en el coamndo jobsjobs}

pgrep {nombre del proceso}
pgre firefox
devuelve el identificador del proceso

Detener un proceso 
kill {identificador de proceso}

 ps aux --> muestra todos los procesos del sistema
ps aux | grep firefox
busca todos los procesos en ejecucion que tienen nombre firefox

