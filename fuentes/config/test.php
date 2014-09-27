<?php
require("parametros.php");
/*
$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

echo var_dump($mySqli);

if($mySqli->connect_errno)
{
    echo $mySqli->connect_error;
}

$query = "SELECT ACT.ID_ACTIVIDAD, 
                ACT.ID_TIPO_ACTIVIDAD, 
                ACT.NOMBRE_ACTIVIDAD, 
                ACT.RESUMEN, 
                ACT.DESCRIPCION, 
                ACT.IMAGEN_RESUMEN, 
                ACT.IMAGEN_RESUMEN_CHICA, 
                ACT.URL_WEB, 
                ACT.ACTIVA,
                TCT.NOMBRE_TIPO_ATIVIDAD
          FROM TBL_ACTIVIDAD ACT
          JOIN TBL_TIPO_ACTIVIDAD TCT ON ACT.ID_TIPO_ACTIVIDAD = TCT.ID_TIPO_ACTIVIDAD
          ";
echo "<hr>";
echo var_dump($query);
echo "<hr>";
$res = $mySqli->query($query);
echo var_dump($res);
echo "<hr>";*/
/*

$objMail = new EnvioMail($V_HOST_SMTP,$V_PORT_SMTP,$V_USER_SMTP,$V_PASS_SMTP,$V_FROM,$V_FROM_NAME,$V_HOST, $V_USER, $V_PASS, $V_BBDD);

$Cuerpo = " $txtNombre - $txtEmail - $txtAsunto - $txtTelefono - $txtComment";
$Asunto = "Contacto go-pucon";
$Para = array("luxohcf@gmail.com" => "Luxo lizama");

echo var_dump($objMail);
echo "<hr>";
echo "cuerpo:";
echo var_dump("$Cuerpo - $Asunto"); 
echo var_dump($Para);
echo "<hr>";
echo var_dump($objMail->EnviarCorreo($Asunto, $Cuerpo, $Para));
echo "<hr>";

$para  = 'luxohcf@gmail.com' . ', '; // atención a la coma
$para .= 'wez@example.com';

// título
$título = 'Recordatorio de cumpleaños para Agosto';

// mensaje
$mensaje = '
<html>
<head>
  <title>Recordatorio de cumpleaños para Agosto</title>
</head>
<body>
  <p>¡Estos son los cumpleaños para Agosto!</p>
  <table>
    <tr>
      <th>Quien</th><th>Día</th><th>Mes</th><th>Año</th>
    </tr>
    <tr>
      <td>Joe</td><td>3</td><td>Agosto</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17</td><td>Agosto</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
echo var_dump("$para, $título, $mensaje, $cabeceras");
echo "<hr>";
// Enviarlo
echo var_dump(mail($para, $título, $mensaje, $cabeceras));  
  
    
$objMail = new EnvioMail($V_HOST_SMTP,$V_PORT_SMTP,$V_USER_SMTP,$V_PASS_SMTP,$V_FROM,$V_FROM_NAME,$V_HOST, $V_USER, $V_PASS, $V_BBDD);

$Cuerpo = "Nombre";

$Asunto = $V_FROM_NAME;
$Para = $V_FROM_CONTACTO;

echo var_dump($objMail->EnviarCorreo($Asunto, $Cuerpo, $Para));*/
?>