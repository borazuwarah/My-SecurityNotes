Este protocoo funciona bajo el protocolo UDP
hay que detectarlo  con nmap -sU (UDP)

nmap -sU --top-ports 200 --min-rate 5000 - -n -Pn {IP_Victima}

Herramientas
[[Onesixtyone (UDP)]] --> conseguir la clave de comunidad
[[snmpwalk  (SNMP)]] --> Enumeración de recursos