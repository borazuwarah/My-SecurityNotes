La intrusión XSS (Cross-Site Scripting) es un tipo de vulnerabilidad de seguridad web que permite a un atacante inyectar scripts maliciosos en el contenido de una página web vista por otros usuarios. Esta vulnerabilidad ocurre cuando una aplicación web permite que datos no confiables sean enviados al navegador sin la debida validación o escapado.

Se da cuando en un formulario se ejecuta el código que se pone en el formulario.

paylod para comprobar si el formulario es sensible a XSS

```sh fold:"Payload para detectar XSS"
	<img src="X" onerror="alert('XSS encontrado');">
```

## Explotación
