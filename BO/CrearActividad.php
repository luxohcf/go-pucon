<?php
require("../config/parametros.php");

$data = array();
$msg = "";

$hdnIdActividad = (isset($_POST['hdnIdActividad']))? $_POST['hdnIdActividad'] : "";
$txtIdTipoActividad = (isset($_POST['txtIdTipoActividad']))? $_POST['txtIdTipoActividad'] : "";
$txtNombreActividad = (isset($_POST['txtNombreActividad']))? $_POST['txtNombreActividad'] : "";
$txtResumenActividad = (isset($_POST['txtResumenActividad']))? $_POST['txtResumenActividad'] : "";
$txtDescripcionActividad = (isset($_POST['txtDescripcionActividad']))? $_POST['txtDescripcionActividad'] : "";
$txtImgResumenActividad = (isset($_POST['txtImgResumenActividad']))? $_POST['txtImgResumenActividad'] : "";

$txtImgResumenChicaActividad = (isset($_POST['txtImgResumenChicaActividad']))? $_POST['txtImgResumenChicaActividad'] : "";
$txtURLActividad = (isset($_POST['txtURLActividad']))? $_POST['txtURLActividad'] : "";
$txtActivaActividad = (isset($_POST['txtActivaActividad']))? $_POST['txtActivaActividad'] : "";

if ($txtActivaActividad == "Activa") {
    $txtActivaActividad = 1;
} else {
    $txtActivaActividad = 0;
}

$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);
if($mySqli->connect_errno)
{
    $data["Error conexion MySql"] = $mySqli->connect_error;
}

$mySqli->autocommit(FALSE);
$mySqli->set_charset("utf8");

// update
if(strlen($hdnIdActividad) > 0)
{
        $query = "UPDATE TBL_ACTIVIDAD SET 
                        ID_TIPO_ACTIVIDAD = ?,
                        NOMBRE_ACTIVIDAD = ?,
                        RESUMEN = ?,
                        DESCRIPCION = ?,
                        IMAGEN_RESUMEN = ?,
                        IMAGEN_RESUMEN_CHICA = ?,
                        URL_WEB = ?,
                        ACTIVA = ?
                  WHERE ID_ACTIVIDAD = ?";
        
        $stm = $mySqli->prepare($query);
        $stm->bind_param("issssssii", $txtIdTipoActividad, $txtNombreActividad, $txtResumenActividad, $txtDescripcionActividad,
                     $txtImgResumenActividad,$txtImgResumenChicaActividad,$txtURLActividad,$txtActivaActividad, $hdnIdActividad);
        
        if($stm->execute())
        {
            if($mySqli->affected_rows > 0)
            {
                $msg = "Se ha actualizado la actividad correctamente";
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
           $msg = "Error al registrar la actividad";
           $data["estado"] = "KO";
        }
} // insert
 else {
    $query = "INSERT INTO TBL_ACTIVIDAD (ID_TIPO_ACTIVIDAD, NOMBRE_ACTIVIDAD, RESUMEN, DESCRIPCION, IMAGEN_RESUMEN, IMAGEN_RESUMEN_CHICA, URL_WEB,  ACTIVA) 
              VALUES (?,?,?,?,?,?,?,?)";
    
    $stm = $mySqli->prepare($query);
    
    $stm->bind_param("issssssi", $txtIdTipoActividad, $txtNombreActividad, $txtResumenActividad, $txtDescripcionActividad,$txtImgResumenActividad
                     ,$txtImgResumenChicaActividad,$txtURLActividad,$txtActivaActividad);
    
    if($stm->execute())
    {
        if($mySqli->affected_rows > 0)
        {
            $msg = "Se ha creado la actividad correctamente";
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
       $msg = "Error al registrar la actividad";
       $data["estado"] = "KO";
    }
}

$data["html"] = "$msg";

echo json_encode($data);
?>