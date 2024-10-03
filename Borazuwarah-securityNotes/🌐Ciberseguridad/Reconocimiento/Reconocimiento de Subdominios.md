
Una vez que tenemos un dominio podemos encontrar subdominios
en ocasiones se puede abusar del certificado SSL


## Phonebook (Herramienta pasiva):[https://phonebook.cz/](https://phonebook.cz/)
## Intelx (Herramienta pasiva)[https://intelx.io/](https://intelx.io/)

## CTFR es una herramienta
[UnaPibaGeek/ctfr: Abusing Certificate Transparency logs for getting HTTPS websites subdomains. (github.com)](https://github.com/UnaPibaGeek/ctfr)
es una herramienta pasiva para listar subdominios

## Gobuster [[Gobuster]]

Nos sirve para descubrir subdominios
está programada en go y está bien optimizado para trabajar con sockets y conexiones.


```sh title:"reconocimiento de subdominiso con gobuster"

gbuster vhost -u https:77tinder.com -w /usr/sgare/SecList/Discovery/DNS/subdomains-top1million-5000.txt -t 20


#si aparece un codigo de status repetido: se puede filtrar

gbuster vhost -u https:77tinder.com -w /usr/sgare/SecList/Discovery/DNS/subdomains-top1million-5000.txt -t 20 | grep -v '403'

# otros diccionarios
# /usr/sgare/SecList/Discovery/DNS/subdomains-top1million-110000.txt
```

## Wfuzz [[wfuzz]]
nos permite descubrir subdominios

```sh title:"reconocimiento de subdominiso con wfuzz"

wfuzz -c -t 20 -w /usr/sgare/SecList/Discovery/DNS/subdomains-top1million-5000.txt -H "Host: FUZZ.tinder.com" http://tinder.com

#filtrar  por campo codigo de estado 403 que no se muestre --hc
# si querems que solo se muestre un estado filtro seria con --sc

wfuzz -c --hc=403 -t 20 -w /usr/sgare/SecList/Discovery/DNS/subdomains-top1million-5000.txt -H "Host: FUZZ.tinder.com" http://tinder.com
 
# otros diccionarios
# /usr/sgare/SecList/Discovery/DNS/subdomains-top1million-110000.txt
```

## **sublist3r**
- [https://github.com/huntergregal/Sublist3r](https://github.com/huntergregal/Sublist3r)

Es una herramienta pasiva aprovechando el OSINT publico
