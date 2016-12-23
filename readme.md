#IsaliaPHP
##Framework PHP

Hola a todos, soy @nelsonrojas y luego de usar algunos frameworks he leído cómo hacer mi propio framework usando php.

http://anantgarg.com/2009/03/13/write-your-own-php-mvc-framework-part-1/
http://anantgarg.com/2009/03/30/write-your-own-php-mvc-framework-part-2/

Inicialmente he seguido el código al pie de la letra, pero luego he modificado cosas.

He incluido NotORM como gestor de datos (pues se basa en PDO) para no usar el SQLBuilder que venía con los ejemplos.
NotORM está incluido como vendor, pero tiene una clase lib/Model que hereda a su vez de lib/Orm.

He usado MySQL para la primera prueba, y el esquema pueden encontrarlo en config/data.sql
La configuración de acceso a la base de datos está en config/config.php

La autenticación está basada en Md5, pero es cosa de hacer ajustes para corregir eso (ver lib/auth.class.php)

Aún quedan cosas por hacer, pero al menos hay un ejemplo de crud (ABM), y de autenticación incluidos.

Bienvenidos sean los comentarios.

Saludos!

Nelson.-

