Imaginando que tenemos el siguiente Dockerfile

```sh fold:"Dockerfile"

FROM ubuntu>latest
RUN apt update && apt upgrade -y

RUN apt install python3 -y

COPY script.py /home

WORKDIR /home

CMD python3 script.py
```


```sh fold:"script.py"

print("Soy un script dockerizado")
```


Corremos la imagen:
```sh fold:"Dockerfile"
docker buildx build --tag mi_script .
```
para exportar usaremos el siguiente comamnndo

```sh fold:"Exportar Imagen en tar"
docker save -o {nombre_del_ficero.tar} mi_script:latest
# mi_script es el nombre de la imagen
```

Esto nos genera un archivo con el nombre que le hayamos puesto al fichero .tar


para importarlo usaremos el siguiente comandosudo coker load -i {nombredelficheor.tar}
