https://vulnyx.com/

Mirror, download:
![[Vulnyx - Doctor img.png]]


## Reconocimiento en la red
![[Vulnyx - Doctor IP.png]]

sudo arp-scan -I eth0 --localnet

![[Vulnyx - Doctor arp-scan.png]]
IP: 192.168.1.139
Ping
![[Vulnyx- Doctro - Ping.png]]

TTL=64 --> Linux

# Reconocimiento

## Nmap

sudo nmap -sS -p- -Pn 192.168.1.139 
![[Vulnyx Doctor - Nmap.png]]


Nmap Scrip
al 80:
sudo nmap --script "vuln" -p80 192.168.1.139
![[Vulnyx - Doctor - Nmap script 80.png]]


al 22:
sudo nmap --script "vuln" -p22 192.168.1.139

![[Vulnyx - Doctor - Nmap script 22.png]]


atacamos la vuln del puerto 22:
CVE-2011-1002

abrimos metasploit:
