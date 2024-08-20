Git es un sistema de control de versiones, ayuda a gestionar y hacer un seguimiento de los cambios en archivos y proyectos.

## SSH key
crear una clave SSH



Agregar el user agent al proyecto git:



```sh fold:"Abrir un agente eval"
eval `ssh-agent`
```


agregar la clave SSH
add ssh:

```sh fold:"Agregar el id_rsa "
ssh-add ../.ssh/newid_rsa
```


Servicio en Windows
Open SSH Authentication Agent


## Git history:
git log --pretty=oneline --graph --decorate --all


## descargar todos los submódulos

```sh fold:"Descargar todos los submodulos"
git submodule update --init --recursive
```

## actualizar un submódulo

desde comandos nos vamos a la ruta local
hacemos una nueva rama  git checkout -b {nombre nueva rama}
git status
git add .
git commit -m "X"
git push
cd .. salimos al proyecto principial 
git status
git add .
git commit -m "a"
git push



## Git fetch
Descarga las actualizaciones sin mergear con lo que tienes en local

## Git pull
es una combinacion de git fetch con git merge
esto significa que dese los cambios del repositorio  y los fusiona directamente en la rama en la que estás trabajando.

## mergear 2 ramas (branch)
te colocas en la rama a la cual quiere mergear 
moverse entre ramas
git checkout {nombre de rama}

git merge (rama que quiere incluir en la rama en la que estas)
# aprender Git:
pagina para aprender git en español
[Learn Git Branching](https://learngitbranching.js.org/?locale=es_ES)


