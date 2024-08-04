Herramienta de línea de comandos utilizada para descargar archivos de la web. Es una utilidad libre y de código abierto que soporta múltiples protocolos de Internet, incluyendo HTTP, HTTPS y FTP. 


### Ejemplos de uso:

#### Descargar un solo archivo

`wget http://example.com/archivo.zip`

#### Descargar un sitio web completo de forma recursiva


`wget --recursive --no-clobber --page-requisites --html-extension --convert-links --restrict-file-names=windows --domains example.com --no-parent http://example.com`

#### Reanudar una descarga interrumpida


`wget -c http://example.com/archivo.zip`

#### Limitar la velocidad de descarga


`wget --limit-rate=200k http://example.com/archivo.zip`