<?php

$V_TITULO = "Go-Pucon";
$V_TEXTO_CONTACTO = "Consultas y reservas:</br>
				     Tel. (56)(45) 441245 | Cel. +56 9 9885 1160 xx";

$V_TEXTO_QUIENES = "CORRETAJE SUR - VENTA Y ARRIENDOS de Casas - Departamentos - Parcelas &amp; Sitios.
                        En Corretajes Sur podrá encontrar el mejor servicio y la mejor propiedad para vivir o arrendar, visite nuestros productos y contáctenos..

                        Estamos Ubicados en Calle General Urrutia #148 - Pucón - Fono +56 (045) 44 1245 Celular +56 (09) 9885 1160 mail:contacto@corretajesur.cl";

$V_LOGO_CHICO = "css/imagenes/logo-10492_74x74.png";
$V_LOGO_GRANDE = "css/imagenes/logo.png";

// 1° (-norte, + sur), 2° (-mar, + cordillera)
$V_CORDENADAS = "-39.29, -72.23";

// usuario y contraseña del usuario admin
$V_ADMIN_ID = "gopucon@gmail.com";
$V_ADMIN_PASS = "2014-gopucon";

$V_HOST = "localhost";
$V_USER = "gopuczly_user";
$V_PASS = "VubuY3mz3w";
$V_BBDD = "gopuczly_bbdd";
 
/* desarrollo 
$V_HOST = "localhost";
$V_USER = "go-pucon";
$V_PASS = "go-pucon";
$V_BBDD = "go-pucon";
 
*/

$V_HOST_SMTP = "mail.gopucon.com";
$V_PORT_SMTP = 587;
$V_USER_SMTP = "mail@gopucon.com";
$V_PASS_SMTP = "2014-gopucon";

$V_FROM      = "noreply@gopucon.com";
$V_FROM_NAME = "Contacto " . $V_TITULO;

$V_MSG_CONFIRMACION = "Hemos recibido su mensaje!"; // pendiente

$V_FROM_CONTACTO = array("gopucon@gmail.com" => $V_TITULO, "luxohcf@gmail.com" => "Luxo lizama");

require_once("comunes.php");

?>