Guardar un dato que ingresa el usuario en una variable
para su posterior uso


read -p "Introduce tu nombre: " variable
echo "Has introducido tu nombre:  $variable"


## Parámetros
También podemos recoger datos como parámetros 
./scrip.sh  parameto1 parametro2

capturar los parámetros:
variable1 = $1
variable2 =  $2
echo "el primer parametro es $variable1 y el segundo es $variable2"

./script.sh Perro Casa
Perro y casa son los Parámetro

El orden es muy importante para capturar los parámetros