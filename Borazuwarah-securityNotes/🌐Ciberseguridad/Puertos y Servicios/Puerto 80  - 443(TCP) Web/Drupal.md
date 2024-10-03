

Drupal es un sistema de gestión de contenido libre y de código abierto (CMS) utilizado para la creación de sitios web y aplicaciones web.

Drupal ofrece un alto grado de personalización y escalabilidad, lo que lo convierte en una opción popular para sitios web complejos y grandes. Drupal se utiliza en una amplia gama de sitios web, desde blogs personales hasta sitios web gubernamentales y empresariales. Es altamente flexible y cuenta con una amplia variedad de módulos y herramientas que permiten a los usuarios personalizar su sitio web para satisfacer sus necesidades específicas.


Drupal revisar si con el nmap conseguimos la versión de drupal

en la pantalla de inicio viendo el código fuente podemos encontrar la versión. 

atacamos con metasploit msfconsole
Herramientas:
[[NMAP]] --> posibilidad de sacar la versión con un script
		nmap -p 80 --script http-drupal-enum {target} todos los enum de nmap para drupal: [http-drupal-enum NSE script — Nmap Scripting Engine documentation](https://nmap.org/nsedoc/scripts/http-drupal-enum.html#:~:text=Script%20Summary.%20Enumerates%20the%20installed%20Drupal)
		
[[Metasploit]]  search drupal {version} usaremos el exploit drupalgeddon o drupalgeddon2
[[Droopescan (Drupal)]]


Los drupal 8.5.X son vulnerables a través de  burpsuite y con el formulario de cambio de ocntraseña
a través de repeater de brupsuite a través de una request POST se ejecutan comandos en el servidor.




