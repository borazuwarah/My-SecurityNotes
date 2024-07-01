Type Debian
Name: CTF_Borazuwarah



root password : ContraseñaMuySegura
user password: 123456




fuerza bruta:
sudo nmap -p- --open -sS -sC -sV 192.168.1.132


sudo nmap -p- --open -sS -sC -sV 192.168.1.132

python3 -m http.server 80    

apuntar el history all dev null:
ln -s /dev/null /root/.bash_history


User Flag: WqQrm1xGe2JMxw39DdNAHt6At820o
root flag: z]5mNv3__o\n`Q+h=azC#ZR;T<q^|FC3Y




url: https://mega.nz/file/3d02UBwC#5jrwgTvgcBDgSTVbbuaDJ0DTv3tkBPl4WIQc8_VVQHg



# Dockerizando 

Así la he creado 

DockerFile: 
FROM debian:latest RUN apt-get update && \ apt-get install -y apache2 openssh-server sudo && \ apt-get clean COPY imagen.jpeg /var/www/html/ 
RUN echo "<html><body><img src='imagen.jpeg'></body></html>" > /var/www/html/index.html RUN useradd -m -s /bin/bash borazuwarah && \ echo 'borazuwarah:123456' | chpasswd && \ usermod -aG sudo borazuwarah 
RUN echo 'borazuwarah ALL=(ALL) NOPASSWD: /bin/bash' >> /etc/sudoers 
CMD service apache2 start && service ssh start && tail -f /dev/null