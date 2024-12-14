commando para hacer peticiones a un servidor


cheat sheet
![[curl-command-cheatshee.pdf]]
## Listar plugings en wordpress con curl

```sh fold:"Listar plugings en wordpress"
curl -s -X GET {dominio principal} | grep plugins

# filtrado por regex:
curl -s -X GET {dominio principal} | grep -oP 'plugings/\K[^/]+' |sort -u
```