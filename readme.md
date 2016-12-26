#IsaliaPHP
##Framework PHP

Hola a todos, soy @nelsonrojas y luego de usar algunos frameworks he leído cómo hacer uno desde cero usando php.

http://anantgarg.com/2009/03/13/write-your-own-php-mvc-framework-part-1/

http://anantgarg.com/2009/03/30/write-your-own-php-mvc-framework-part-2/

**La intención principal es que este repositorio sirva como material de estudio, nada 100% serio, y lo expongo sin ningún tipo de garantia**

Se ha incluido NotORM como gestor de datos (pues se basa en PDO) para no usar el SQLBuilder que venía con los ejemplos.
NotORM está incluido como vendor, pero tiene una clase lib/Model que hereda a su vez de lib/Orm.

También se ha usado MySQL para la primera prueba, y el esquema puede encontrarse en config/data.sql
La configuración de acceso a la base de datos está en config/config.php

La autenticación está basada en Md5 con un usuario llamado admin, cuya clave también es admin. Para mejorar la autenticación basta con hacer cambios en lib/auth.class.php

Aún quedan cosas por hacer, pero al menos hay un ejemplo de crud (ABM), y de autenticación incluidos.

Bienvenidos sean los comentarios.

Saludos!

Nelson.-

