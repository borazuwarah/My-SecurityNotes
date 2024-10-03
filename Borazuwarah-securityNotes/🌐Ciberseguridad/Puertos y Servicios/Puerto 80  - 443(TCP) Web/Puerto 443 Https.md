
**HTTPS** (**Hypertext Transfer Protocol Secure**) es una **versión segura** de HTTP que utiliza SSL / TLS para cifrar la comunicación entre el cliente y el servidor. Utiliza el puerto 443 por defecto. La principal diferencia entre HTTP y HTTPS es que HTTPS utiliza una capa de seguridad adicional para cifrar los datos, lo que los hace más seguros para la transferencia.

Herramientas
OpenSSL --> una biblioteca de software libre y de código abierto que se utiliza para implementar protocolos de seguridad en línea, como TLS (Transport Layer Security), SSL (Secure Sockets Layer). La biblioteca OpenSSL proporciona una implementación de estos protocolos para permitir que las aplicaciones se comuniquen de manera segura y encriptada a través de la red.

sslyze -->
sslscan --> inspecciona el certificado y puede detectar vulnerabilidades 

inspccion del certificado:
nos permite encontrar correos subdominios si están públicos.

Uso:
```sh fold:"Connexion con openssl"
openssl s_client -connect {dominio}.com:443
```


uso de sslscan
```sh fold:"uso0 de sslscan"
sslscan {dominio}
```



Inspección del certificado


## Vulnerabilidades
- heartbleed permite robar la RAM de la máquin a

