Enumerar información 

## uso para buscar subdominios
```sh fold:"wfuzz para descubrir subdominios"
wfuzz -c --hc=404 -w /usr/share/wordlists/seclists/Discovery/DNS/subdomains-top1millon-110000.txt -H "Host: Fuzz.{dominioPrincipal}" -u {ip_victima}
```


## descubrir subdominios

```sh fold:"wfuzz para descubrir subdominios ocultando los resultados con 11L"
wfuzz -c --hc=404 -hl=11 -w /usr/share/wordlists/seclists/Discovery/DNS/subdomains-top1millon-110000.txt -H "Host: Fuzz.{dominioPrincipal}" -u {ip_victima}
```