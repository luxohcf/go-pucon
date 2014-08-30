<?php
require("../config/parametros.php");
$data = array();
$msg = "";


$txtNombre = (isset($_POST['txtNombre']))? $_POST['txtNombre'] : "";
$txtEmail = (isset($_POST['txtEmail']))? $_POST['txtEmail'] : "";
$txtAsunto = (isset($_POST['txtAsunto']))? $_POST['txtAsunto'] : "";
$txtTelefono = (isset($_POST['txtTelefono']))? $_POST['txtTelefono'] : "";
$txtComment = (isset($_POST['txtComment']))? $_POST['txtComment'] : "";

// Pendiente enviar el mail

$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);
if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}

$mySqli->autocommit(FALSE);
$mySqli->query("SET NAMES 'utf8'");
$mySqli->query("SET CHARACTER SET 'utf8'");

$queryIns = "INSERT INTO TBL_CLIENTES (NOMBRE, EMAIL, TELEFONO, FECHA_CREACION) 
             VALUES
                ('$txtNombre', '$txtEmail', '$txtTelefono', NOW())";

$res = $mySqli->query($queryIns);

if($mySqli->errno == 0)
{
    if($mySqli->affected_rows > 0)
    {
        $msg = "Hemos recibido su mensaje!";
        $mySqli->commit();
        $mySqli->close();
        $data["estado"] = "OK";
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