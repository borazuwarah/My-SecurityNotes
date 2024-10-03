Una de las herramientas que utilizamos para la fase de reconocimiento es ‘**smbmap**‘. Smbmap es una herramienta de línea de comandos utilizada para enumerar recursos compartidos y permisos en un servidor SMB (Server Message Block) o Samba. Es una herramienta muy útil para la enumeración de redes y para la identificación de posibles vulnerabilidades de seguridad.

Con smbmap, puedes enumerar los recursos compartidos en un servidor SMB y obtener información detallada sobre cada recurso, como los permisos de acceso, los usuarios y grupos autorizados, y los archivos y carpetas compartidos. También puedes utilizar smbmap para identificar recursos compartidos que no requieren autenticación, lo que puede ser un problema de seguridad.

Además, smbmap permite a los administradores de sistemas y a los auditores de seguridad verificar rápidamente la configuración de permisos en los recursos compartidos en un servidor SMB, lo que puede ayudar a identificar posibles vulnerabilidades de seguridad y a tomar medidas para remediarlas.

A continuación, se proporciona una breve descripción de algunos de los parámetros comunes de smbmap:

- **-H**: Este parámetro se utiliza para especificar la dirección IP o el nombre de host del servidor SMB al que se quiere conectarse.
- **-P**: Este parámetro se utiliza para especificar el puerto TCP utilizado para la conexión SMB. El puerto predeterminado para SMB es el 445, pero si el servidor SMB está configurado para utilizar un puerto diferente, este parámetro debe ser utilizado para especificar el puerto correcto.
- **-u**: Este parámetro se utiliza para especificar el nombre de usuario para la conexión SMB.
- **-p**: Este parámetro se utiliza para especificar la contraseña para la conexión SMB.
- **-d**: Este parámetro se utiliza para especificar el dominio al que pertenece el usuario que se está utilizando para la conexión SMB.
- **-s**: Este parámetro se utiliza para especificar el recurso compartido específico que se quiere enumerar. Si no se especifica, smbmap intentará enumerar todos los recursos compartidos en el servidor SMB.

## Instalación

## Enumeración de recursos

```sh fold:"smbclient enumeracion"
smbmap -H {ip} -u '{usuario}' -p '{password}'
# -N para intentar con null sesion
```

### ejemplo de salida:
![[SMBMAP salida.png]]