## Sistema de generación de certificado para pruebas de descarte de COVID-19
<p>Sistema diseñado para poder generar un certificado de acuerdo a resultados de pruebas antígenas o serológicas a los pacientes.</p>
<p>Se realiza el llenado automático de datos de pacientes de nacionalidad peruana utilizando una API con los datos directamente proporcionados por la RENIEC.</p>

> NOTA: solamente se realiza el llenado automático de nombres y apellidos de personas de nacionalidad peruana mayores de edad.

------------

### Instalación
1. Clonar el repositorio en el entorno de trabajo a utilizar
2. Cargar las dependencias del proyecto utilizando el siguiente comando de composer: `composer install`
3. Cargar las dependencias de NPM con el comando `npm install`
4. Crear y configurar el archivo .env con el nombre de base de datos preferido. *EJ: reportes_covid*
> NOTA: Utilizar el archivo .env.example como referencia para configurar el archivo .env.
5.  Ejecutar el siguiente comando: `php artisan key:generate`
6. Ejecutar las migraciones del proyecto: `php artisan migrate`

------------

### Uso
- Seleccionar el proveedor del cual se quiere generar el certificado.
- Para registrar personas por DNI, seleccionar el tipo de documento y colocar el nro de documento, el sistema rellenará automáticamente los campos de nombres y apellidos del paciente y al final del llenado de la información solicitada se generará el certificado en PDF para ser descargado.
- Se puede seleccionar también el check de "muestra para viaje" para añadir datos de pasaporte si se necesitara.

> Tomar en cuenta que el formato de certificado se ha diseñado de acuerdo a los estándares de Perú. Dichos formatos pueden ser adaptados y/o modificados según las necesidades de cada país en la ruta: resources/views/reports
