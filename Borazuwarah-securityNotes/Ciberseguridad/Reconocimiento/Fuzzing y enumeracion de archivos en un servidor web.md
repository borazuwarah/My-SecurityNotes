herramientas 

- [[Gobuster]] 
- [[wfuzz]]
- [[Burpsuite]]


## Gobuster
con esta herramienta ademas de reconocimiento de dominios tambien podemos hacer un reconocimiento de recursos web:

```sh fold:"gobuster para reconocimiento de recursos web"
gobuster dir  -u {dominio} -w /usr/share/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt -t 200


# meter un / al final:
gobuster dir  -u {dominio} -w /usr/share/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt -t 200 --add-slash

# para quitar algunos codigos de estado que no son correctos
quitar el codigo 403

gobuster dir  -u {dominio} -w /usr/share/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt -t 200 --add-slash -b 403

gobuster dir  -u {dominio} -w /usr/share/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt -t 200 --add-slash -b 403,404

# puedes indiar que extensiones quieres aplicar
gobuster dir  -u {dominio} -w /usr/share/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt -t 200  -b 403,404 -x php,html,hxt


#mostrar solo los de estado 200
gobuster dir  -u {dominio} -w /usr/share/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt -t 20  -s 200 -x php,html,hxt

gobuster dir  -u {dominio} -w /usr/share/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt -t 20  -s 200  -b '' -x php,html,hxt

```




## Wfuzz

```sh fold:"wfuzz para reconocimiento de recursos web"

wfuzz -c -t 200 -w /usr/share/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt https://{dominio}/FUZZ


# quitar las respuestas con resultado codigo 404

wfuzz -c --hc=404 -t 200 -w /usr/share/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt https://{dominio}/FUZZ

# quitar las respuestas con resultado codigo 404 y 403

wfuzz -c  --hc 404,403 -t 200 -w /usr/share/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt https://{dominio}/FUZZ

# si hay redirect (codigo 30X) se puede intentar un follow del rediret
wfuzz -c -L --hc=404,403 -t 200 -w /usr/share/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt https://{dominio}/FUZZ


# si no muestra nada por consola quitar el -L y poner un / al final
# si hay redirect (codigo 30X) se puede intentar un follow del rediret
wfuzz -c --hc=404,403 -t 200 -w /usr/share/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt https://{dominio}/FUZZ/

# encontrar extensiones
wfuzz -c --hc=404,403 -t 200 -w /usr/share/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt  -z list,html-txt-php https://{dominio}/FUZZ/.FUZ2Z


# payload de tipo range
wfuzz -c  -t 200 -z range,1-20000 list,html-txt-php 'https:77www.mi.xiami.com/shop/buy/detail?product_id=FUZZ'


# campos filtrables
# hc --> ocultar a nivel de codigo = indicada
# sc --> mostrar a nivel de codigo = indicado
# hh --> ocultar a nivel de caracteres = las indicadas
# sh --> mostrar a nivel de caracteres = las indicadas
# sl --> mostrar por Lineas = indicadas
# hl --> ocultar por lineas = indicadas
# hw --> oculatar a nivel de palabra = indicadas
# sw --> mostrar a nivel de palebra = indicada

```


## FFUF
herramienta en GO:
[ffuf/ffuf: Fast web fuzzer written in Go (github.com)](https://github.com/ffuf/ffuf)
funciona de forma pasiva

```sh fold:"Fuzz para reconocimiento de recursos web"
# forma de uso
fuzz -c -t 200 -w /usr/share/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt -u http://{dominio}/FUZZ

#si da error de redireccion ponemos / al final:
fuzz -c -t 200 -w /usr/share/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt -u http://{dominio}/FUZZ/

filtrarpor codigo de estados 200
fuzz -c -t 200 -w /usr/share/SecLists/Discovery/Web-Content/directory-list-2.3-medium.txt -u http://{dominio}/FUZZ/ --mc=200

```


## Phonebook.cz
herramienta web para listar subdominios de forma pasiva
marcando urls tambien podemos enontrar rutas o recursos, ficheros

## Burpsuite
Desde burpsuite también se puede hacer fuzz para localizar y/o encontrar recursos o rutas

Puedes ver como se envian las solicitudes, cambiar registos y hacer peticiones diferentes


