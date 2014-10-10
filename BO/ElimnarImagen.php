<?php
require("../config/parametros.php");

$data = array();
$msg = "";

$hdnId = (isset($_POST['id']))? $_POST['id'] : "";

$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);
if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}

$mySqli->autocommit(FALSE);

// update
if(strlen($hdnId) > 0)
{

    $query = "DELETE FROM TBL_IMAGEN 
              WHERE ID_IMAGEN = $hdnId";
    
    $res = $mySqli->query($query);
    
    if($mySqli->errno == 0)
    {
        if($mySqli->affected_rows > 0)
        {
            $msg = "Se ha eliminado la imagen correctamente";
            $mySqli->commit();
            $mySqli->close();
            $data["estado"] = "OK";
        }
        else {
           $mySqli->rollback(); 
           $mySqli->close();
           $msg = "No se han realizado cambios";
           $data["estado"] = "OK";
        }
    }
    else {
       $mySqli->rollback(); 
       $mySqli->close();
       $msg = "Error al eliminar la imagen";
       $data["estado"] = "KO";
    }
}

$data["html"] = "$msg";

echo json_encode($data);
?>