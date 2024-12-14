video interesante:
https://www.youtube.com/watch?v=K_NzC_d-nWo:
<iframe width="560" height="315" src="https://www.youtube.com/embed/K_NzC_d-nWo?si=_lWs8vPzvC8VeBUJ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>


Permite a los profesionales de la seguridad y a los desarrolladores identificar y explotar vulnerabilidades en sus aplicaciones. Algunas de sus funciones principales incluyen:

- **Intercepción de tráfico**: Permite interceptar, modificar y analizar el tráfico entre el navegador y el servidor web.
- **Escaneo automatizado**: Detecta automáticamente vulnerabilidades comunes.
- **Fuzzing**: Envia una gran cantidad de datos de prueba para encontrar fallos en la aplicación.
- **Análisis de respuesta**: Inspecciona las respuestas del servidor para encontrar información sensible.
## Burpsuite certificado SSL
Para webs con certificado SSL (HTTPS) se puede exportar el certificado  e importarlo en el navegador para evitar que burpsuite nos esté preguntando constantemente por aceptar o no el certificado
Vamos a proxy settings /  button Import/export certifiate
DFe esta manera exportamos el certificado de burpsuite
Export --> Certificate in DER format
descargamos el certificado en un fichero 

Ahora vamos al navegador  / settings
certificates import--> Agremagos el certificado  descargado de burpsuite

## Scope en burpsuite
Para evitar ruido/problemas y que burpsuite pare solo las peticiones del dominio/IP que deseeamos se puede agregar un scope a burpsuite

para hacerlo en la peticion que queremos marcamos con el derecho / Add to scope por tanto todas las peticiones que estén fuera del scope no van a ser interceptadas








## Burpsuite repeater
permite enviar manualmente solicitudes HTTP específicas y analizar las respuestas del servidor. Es especialmente útil para:

- **Modificar y repetir solicitudes**: Puedes ajustar los parámetros de una solicitud y reenviarla para ver cómo responde el servidor.
- **Análisis detallado**: Permite un análisis detallado de cómo el servidor maneja diferentes entradas.
- **Pruebas de vulnerabilidades**: Ayuda a probar y explotar manualmente vulnerabilidades descubiertas, como inyecciones SQL o Cross-Site Scripting (XSS).

El Repeater es una herramienta clave para realizar pruebas de penetración detalladas y comprender mejor el comportamiento de la aplicación bajo diferentes condiciones

## Burpsuite intruder
Herramienta poderosa y flexible utilizada para automatizar ataques de fuerza bruta y pruebas de seguridad en aplicaciones web. Permite realizar una variedad de ataques automatizados mediante el envío de múltiples solicitudes HTTP con diferentes datos de entrada. Algunas de sus características principales incluyen:

- **Fuerza bruta**: Probar múltiples combinaciones de credenciales o datos de entrada para encontrar credenciales válidas o datos sensibles.
- **Fuzzing**: Enviar grandes cantidades de datos aleatorios o específicos para encontrar fallos y vulnerabilidades.
- **Ataques dirigidos**: Realizar ataques personalizados contra parámetros específicos para descubrir debilidades en la aplicación.

El Intruder es esencial para encontrar y explotar vulnerabilidades complejas que requieren múltiples intentos con diferentes datos de entrada.

Las principales herramientas que componen BurpSuite son las siguientes:

- **Proxy**: Es la herramienta principal de BurpSuite y actúa como un intermediario entre el navegador web y el servidor web. Esto permite a los usuarios interceptar y modificar las solicitudes y respuestas HTTP y HTTPS enviadas entre el navegador y el servidor. El Proxy también es útil para la identificación de vulnerabilidades, ya que permite a los usuarios examinar el tráfico y analizar las solicitudes y respuestas.
- **Scanner**: Es una herramienta de prueba de vulnerabilidades automatizada que se utiliza para identificar vulnerabilidades en aplicaciones web. El Scanner utiliza técnicas de exploración avanzadas para detectar vulnerabilidades en la aplicación web, como inyecciones SQL, cross-site scripting (XSS), vulnerabilidades de seguridad de la capa de aplicación (OSWAP Top 10) y más.
- **Repeater**: Es una herramienta que permite a los usuarios reenviar y repetir solicitudes HTTP y HTTPS. Esto es útil para probar diferentes entradas y verificar la respuesta del servidor. También es útil para la identificación de vulnerabilidades, ya que permite a los usuarios probar diferentes valores y detectar respuestas inesperadas.
- **Intruder**: Es una herramienta que se utiliza para automatizar ataques de fuerza bruta. Los usuarios pueden definir diferentes payloads para diferentes partes de la solicitud, como la URL, el cuerpo de la solicitud y las cabeceras. Posteriormente, Intruder automatiza la ejecución de las solicitudes utilizando diferentes payloads y los usuarios pueden examinar las respuestas para identificar vulnerabilidades.
- **Comparer**: Es una herramienta que se utiliza para comparar dos solicitudes HTTP o HTTPS. Esto es útil para detectar diferencias entre las solicitudes y respuestas y analizar la seguridad de la aplicación.

Se trata de una herramienta extremadamente potente, la cual puede ser utilizada para identificar una amplia variedad de vulnerabilidades de seguridad en aplicaciones web. Al utilizar las diferentes herramientas que componen BurpSuite, los usuarios pueden identificar vulnerabilidades de forma automatizada o manual, según sus necesidades. Esto permite a los usuarios encontrar vulnerabilidades y corregirlas antes de que sean explotadas por un atacante.

En resumen, Burp Suite es una herramienta imprescindible para cualquier profesional de seguridad informática que busque asegurar la seguridad de aplicaciones web. En la siguiente sección, tendremos la oportunidad de utilizar BurpSuite en detalle y sacarle el máximo provecho a esta herramienta.

## Burpsuite comparer 
Comparer sirve para comparar respuestas del lado del servidor y ver las diferencias
vamos a una  respuesta del servidor y la copiamos (Pretty) y la pegamos en comparer
Copiamos otra respuesta (diferente a la anterior) del servidor y la copiamos (Pretty) y la pegamos en comparer
marcamos por qué la queremos comparar  (caracteres/ palabras...) y mostrará un resultado comparatiorio de las respeustas

## Burpsuite doceder
es una herramienta dentro del burpsuite que sireve para encodeear strings
tambien sirve para decodear codigos

base64 / urlncode entre otros tipos de ncodeado disponible en esta herramienta