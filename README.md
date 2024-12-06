**Patient Registration** 

LightIt challenge para registro de pacientes, desarrollado en Php con el framework Yii.

El sitio esta es accedido desde http://localhost:8000/

PhpMyAdmin corriendo en http://localhost:8080/

Para configurar MailTrap, si es que se quiere usar otro usuario se debe ir a los archivos: web.php y console.php. 
Buscar el componente 'mailer' -> transport -> dsn. Y sustituir con los datos del usuario de MailTrap:  
'dsn' => 'smtp://{Username}:{Password}@sandbox.smtp.mailtrap.io:2525'
