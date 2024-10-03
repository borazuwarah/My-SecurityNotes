 
parte del código malicioso (como virus, malware o ransomware) que realiza la acción deseada por el atacante una vez que ha infectado un sistema. Este término se utiliza comúnmente para describir el código o los datos que se entregan al sistema comprometido para ejecutar una tarea específica, como la extracción de datos, el bloqueo de acceso a archivos (en el caso de ransomware), o incluso el control remoto del sistema comprometido.

Los payloads pueden ser muy variados y están diseñados para lograr los objetivos específicos del atacante, desde la recolección de información sensible hasta el daño directo a los sistemas comprometidos. Los expertos en ciberseguridad suelen analizar los payloads para comprender cómo funcionan y desarrollar contramedidas eficaces para proteger sistemas y redes contra estos ataques.

- **Payload Staged**: Es un tipo de payload que se **divide en dos** **o más etapas**. La primera etapa es una pequeña parte del código que se envía al objetivo, cuyo propósito es establecer una conexión segura entre el atacante y la máquina objetivo. Una vez que se establece la conexión, el atacante envía la segunda etapa del payload, que es la carga útil real del ataque. Este enfoque permite a los atacantes sortear medidas de seguridad adicionales, ya que la carga útil real no se envía hasta que se establece una conexión segura.

- **Payload Non-Staged**: Es un tipo de payload que se envía como **una sola entidad** y **no se divide en múltiples etapas**. La carga útil completa se envía al objetivo en un solo paquete y se ejecuta inmediatamente después de ser recibida. Este enfoque es más simple que el Payload Staged, pero también es más fácil de detectar por los sistemas de seguridad, ya que se envía todo el código malicioso de una sola vez.

Es importante tener en cuenta que el tipo de payload utilizado en un ataque dependerá del objetivo y de las medidas de seguridad implementadas. En general, los payloads Staged son más difíciles de detectar y son preferidos por los atacantes, mientras que los payloads Non-Staged son más fáciles de implementar pero también son más fáciles de detectar.

# Herramientas
[[MSFVENOM]] --> generador de Payloads
[[Metasploit]]