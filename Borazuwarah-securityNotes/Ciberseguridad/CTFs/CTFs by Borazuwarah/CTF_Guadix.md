Ambientado en la ciudad de GUADIX

Puertos
80 web
22 ssh


Intrusión 
web de guadix de bienvenida
buscamos con gobuster y encontramos admin
panel login, atacamos ocn sqlmap
consegumos unas credenciales  pass encriptada en md5
accedemos solo a la parte de administracion de la web
en la parte de administracion de la web encontramos un formulario para subir ficheros
LFI

SO debian 12
Root pass : 123456
gdx pass 123456


Estatus
Instalado php apache2 mariadb-server
cambiando puerto de apache2
nano /etc/apache2/ports.conf listen to 699
nano /etc/apache2/sites-available/000-default.conf to 669

reiniciar el servicio con systemctl restart apache2

--
crear usuario en mysql
comprobar que los fichero php se ejecutan
