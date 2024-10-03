Sirve para enumerar  información  de SNMP pero se necesita una clave de comunidad (se obtiene con onesixtyone)
## Instalación

## Uso
```sh fold:"smbclient enumeracion"
snmpwalk -v 2c  -c {ClaveOptenida_Con_OnexistyOne}

# lo normal será encontrarnos con un dominio que debemos apuntarlo en el fichoer host
# revisar si ese dominio tiene subdominios con wfuzz
```