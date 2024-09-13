Estándar para los protocolos de RED
se compone de capas:

7 - Aplicación --> capa para consumir los datos (enviar mails, conectar a webs) protocolos mas conocidos como FTP, HTP...
6 - Presentación --> capa responsable de traducir todos los datos para que los entienda la siguiente capa (Aplicación), conversión de codigo a caracteres la conversión y compresión de los datos y el cifrado de datos
5 - Sesión --> Es la responsable de establecer y terminar la conexión entre HOST, también brinda Logs y tareas de seguridad
4 - Transporte --> (camiones y carteros)  Garantiza el envío y recepcion provenientes de capa 3, gestiona transporte de paquetes para garantizar el exito en el envio y recepcion de los datos protocolos TCP y UDP
3 - Red --> Actúa como la oficina de correos, tiene el origen y destino del paquete, también prioriza algunos paquetes y decidir algunos rutas 
	Enrutamiento de paquetes
2 - Datos/Enlace --> Actúa como inspector y observa si los paquetes están correctos (si tienen error se intenta corregir) Aquí operan los Switches
1 - Física --> Vías por donde se mueven los paquetes y se procesan en la siguiente capa