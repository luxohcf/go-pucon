<?php
require("../config/parametros.php");

$data = array();
$msg = "";

$hdnIdImagen = (isset($_POST['hdnIdImagen']))? $_POST['hdnIdImagen'] : "";
$txtIdActividad = (isset($_POST['txtIdActividad']))? $_POST['txtIdActividad'] : "";
$txtUrlImagen = (isset($_POST['txtUrlImagen']))? $_POST['txtUrlImagen'] : "";
$txtPrincipalImagen = (isset($_POST['txtPrincipalImagen']))? $_POST['txtPrincipalImagen'] : "";

if ($txtPrincipalImagen == "on") {
    $txtPrincipalImagen = 1;
} else {
    $txtPrincipalImagen = 0;
}

$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);
if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}

$mySqli->autocommit(FALSE);
$mySqli->set_charset("utf8");

// update
if(strlen($hdnIdImagen) > 0)
{
        $query = "UPDATE TBL_IMAGEN SET 
                        ID_ACTIVIDAD = ?,
                        URL_IMAGEN = ?,
                        ES_PRINCIPAL = ?
                  WHERE ID_IMAGEN = ?";
        
        $stm = $mySqli->prepare($query);
        $stm->bind_param("isii", $txtIdActividad, $txtUrlImagen, $txtPrincipalImagen, $hdnIdImagen);
        
        if($stm->execute())
        {
            if($mySqli->affected_rows > 0)
            {
                $msg = "Se ha actualizado la imagen correctamente";
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
           $msg = "Error al registrar la imagen";
           $data["estado"] = "KO";
        }
} // insert
 else {
    $query = "INSERT INTO TBL_IMAGEN (ID_ACTIVIDAD, URL_IMAGEN, ES_PRINCIPAL) 
              VALUES (?,?,?)";
    
    $stm = $mySqli->prepare($query);
    
    $stm->bind_param("isi", $txtIdActividad, $txtUrlImagen, $txtPrincipalImagen);
    
    if($stm->execute())
    {
        if($mySqli->affected_rows > 0)
        {
            $msg = "Se ha creado la imagen correctamente";
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
       $msg = "Error al registrar la imagen - $query";
       $data["estado"] = "KO";
    }
}

$data["html"] = "$msg";

echo json_encode($data);
?>