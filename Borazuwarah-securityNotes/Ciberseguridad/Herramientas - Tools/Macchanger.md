
[macchanger | Kali Linux Tools](https://www.kali.org/tools/macchanger/)

Herramienta en Linux que se utiliza para cambiar o **"falsificar"** la dirección MAC (Media Access Control) de una interfaz de red. Esto puede ser útil para mantener la privacidad, evitar restricciones de red basadas en la dirección MAC, o simplemente para probar el comportamiento de redes o dispositivos con diferentes direcciones MAC.

### Funciones principales de `macchanger`:

- **Mostrar la dirección MAC actual**: `macchanger` puede mostrar la dirección MAC original y la que está asignada actualmente.
- **Cambiar la dirección MAC temporalmente**: Puedes asignar una nueva dirección MAC que será válida hasta que reinicies el dispositivo o vuelvas a asignar la original.
- **Asignar una dirección MAC aleatoria**: Se puede generar y asignar automáticamente una dirección MAC aleatoria.
- **Restaurar la dirección MAC original**: También permite restaurar la dirección MAC a su valor original.



- Mostrar la dirección MAC actual:
    `macchanger -s eth0`
    
    Esto muestra la dirección MAC actual de la interfaz `eth0`.
    
- Cambiar la dirección MAC a una aleatoria:    
    `macchanger -r eth0`
    
- Cambiar la dirección MAC a un valor específico:
    `macchanger -m 00:11:22:33:44:55 eth0`
- Restaurar la dirección MAC original:
    `macchanger -p eth0`