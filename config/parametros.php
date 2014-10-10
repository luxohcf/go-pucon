<?php

/* Sitio construido y desarrollado por Luis Lizama
 * Versión 1.0 Octubre 2014
 * E-Mail luxohcf@gmail.com
 * */

// titulo de la pagina
$V_TITULO = "Go-Pucon";
// texto del boton contacto
$V_TEXTO_CONTACTO = "Consultas y reservas:</br>
				     Tel. (56)(45) 441245 | Cel. +56 9 9885 1160 xx";
// texto del quienes somos
$V_TEXTO_QUIENES = "CORRETAJE SUR - VENTA Y ARRIENDOS de Casas - Departamentos - Parcelas &amp; Sitios.
                        En Corretajes Sur podrá encontrar el mejor servicio y la mejor propiedad para vivir o arrendar, visite nuestros productos y contáctenos..

                        Estamos Ubicados en Calle General Urrutia #148 - Pucón - Fono +56 (045) 44 1245 Celular +56 (09) 9885 1160 mail:contacto@corretajesur.cl";
// logo del quienes somos
$V_LOGO_CHICO = "css/imagenes/logo-10492_74x74.png";
// logo principal
$V_LOGO_GRANDE = "css/imagenes/logo.png";
// icono de la pagina
$V_ICON = "css/imagenes/logo-10492_74x74.png";
// coordenadas ubicacion
$V_CORDENADAS = "-39.275290, -71.970016";
// texto del mensaje en el mapa de ubicacion
$V_DIRECCION = "<img src='css/imagenes/logo-10492_74x74.png' style='float: left!important;' /><p>Av. Bernardo O'Higgins #717, local C</p>";

// usuario y contraseña del usuario admin
$V_ADMIN_ID = "gopucon@gmail.com";
$V_ADMIN_PASS = "2014-gopucon";
// credenciales base de datos
$V_HOST = "localhost";
$V_USER = "gopuczly_user";
$V_PASS = "VubuY3mz3w";
$V_BBDD = "gopuczly_bbdd";
// credenciales envio de correo
$V_HOST_SMTP = "mail.gopucon.com";
$V_PORT_SMTP = 587;
$V_USER_SMTP = "mail@gopucon.com";
$V_PASS_SMTP = "2014-gopucon";
// remitente correo automatico
$V_FROM      = "noreply@gopucon.com";
// nombre remitente
$V_FROM_NAME = "Contacto " . $V_TITULO;
// mensaje de confirmacion correo automatico
$V_MSG_CONFIRMACION = "Hemos recibido su mensaje!"; // pendiente
// destinatarios correo contacto
$V_FROM_CONTACTO = array("gopucon@gmail.com" => $V_TITULO, "luxohcf@gmail.com" => "Luxo lizama");

require_once("comunes.php");

?>