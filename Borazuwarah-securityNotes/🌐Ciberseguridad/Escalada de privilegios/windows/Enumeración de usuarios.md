net users --> enumera los usuarios del sistema


una vez comprometida la máquina 

```sh fold:"Enumera usuarios en windows"
meterpreter > net users
no funciona
meterpreter > shell
C:\Windows\System32>net users
Si funciona



# volver a meterpreter
exit
meterpreter >
```