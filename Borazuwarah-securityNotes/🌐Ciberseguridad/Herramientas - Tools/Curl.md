
## Listar plugings en wordpress

```sh fold:"Listar plugings en wordpress"
curl -s -X GET {dominio principal} | grep plugins

# filtrado por regex:
curl -s -X GET {dominio principal} | grep -oP 'plugings/\K[^/]+' |sort -u
```