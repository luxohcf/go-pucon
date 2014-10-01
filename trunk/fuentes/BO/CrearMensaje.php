<?php
session_start();
require("../config/parametros.php");
$data = array();
$msg = "";

$txtNombre = (isset($_POST['txtNombre']))? $_POST['txtNombre'] : "";
$txtEmail = (isset($_POST['txtEmail']))? $_POST['txtEmail'] : "";
$txtAsunto = (isset($_POST['txtAsunto']))? $_POST['txtAsunto'] : "";
$txtTelefono = (isset($_POST['txtTelefono']))? $_POST['txtTelefono'] : "";
$txtComment = (isset($_POST['txtComment']))? $_POST['txtComment'] : "";

include_once '../vender/securimage/securimage.php';
$securimage = new Securimage();
if (!$securimage->check($_POST['txtCaptcha'])) {
	$data["estado"] = "KO";
	$data["html"] = "No coincide el captcha";
	die(json_encode($data));
}

// enviar el mail
$objMail = new EnvioMail($V_HOST_SMTP,$V_PORT_SMTP,$V_USER_SMTP,$V_PASS_SMTP,$V_FROM,$V_FROM_NAME,$V_HOST, $V_USER, $V_PASS, $V_BBDD);

$Cuerpo = "
          <p>Con fecha ".date("d-M-Y H:m:s")." se ha recibido el siguiente contacto:</p>
          <br>
          <ul>
              <li>Nombre: $txtNombre</li>
              <li>Mail: $txtEmail</li>
              <li>Asunto: $txtAsunto</li>
              <li>Telefono: $txtTelefono</li>
              <li>Comentario: $txtComment</li>
          </ul>
          <br>
          <small>Mensaje generado autom&aacute;ticamente</small>
           ";

$Asunto = $V_FROM_NAME;
$Para = $V_FROM_CONTACTO;

$objMail->EnviarCorreo($Asunto, $Cuerpo, $Para);
// enviar correo de confirmación

$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);
if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}

$mySqli->autocommit(FALSE);
$mySqli->set_charset("utf8");

$queryIns = "INSERT INTO TBL_CLIENTES (NOMBRE, EMAIL, TELEFONO, ASUNTO, COMENTARIO, FECHA_CREACION) 
             VALUES
                ('$txtNombre', '$txtEmail', '$txtTelefono', '$txtAsunto', '$txtComment', NOW())";

$res = $mySqli->query($queryIns);

if($mySqli->errno == 0)
{
    if($mySqli->affected_rows > 0)
    {
        $msg = "Hemos recibido su mensaje!";
        $mySqli->commit();
        $mySqli->close();
        $data["estado"] = "OK";
        $Para = array ($txtEmail => $txtNombre);
        $objMail->EnviarCorreo($Asunto, $V_MSG_CONFIRMACION, $Para);

    }
    else {
       $mySqli->rollback(); 
       $mySqli->close();
       $msg = "Ha ocurrido un error al recibir su  mensaje";
       $data["estado"] = "OK";
    }
}
else {
   $mySqli->rollback(); 
   $mySqli->close();
   $msg = "Ha ocurrido un error al recibir su  mensaje";
   $data["estado"] = "KO";
}

$data["html"] = "$msg";

echo json_encode($data)
?>