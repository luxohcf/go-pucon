<?php
require("../config/parametros.php");

$aaData = array();
$query = "SELECT IMG.ID_IMAGEN, 
                 IMG.ID_ACTIVIDAD, 
                 IMG.URL_IMAGEN, 
                 IMG.ES_PRINCIPAL,
                 ACT.NOMBRE_ACTIVIDAD,
                 TAC.NOMBRE_TIPO_ATIVIDAD
                 
          FROM TBL_IMAGEN IMG
          JOIN TBL_ACTIVIDAD ACT ON IMG.ID_ACTIVIDAD = ACT.ID_ACTIVIDAD
          JOIN TBL_TIPO_ACTIVIDAD TAC ON ACT.ID_TIPO_ACTIVIDAD = TAC.ID_TIPO_ACTIVIDAD";

$mySqli = new mysqli($V_HOST, $V_USER, $V_PASS, $V_BBDD);

if($mySqli->connect_errno)
{
    $aErrores["Error conexion MySql"] = $mySqli->connect_error;
}
$mySqli->set_charset("utf8");
$res = $mySqli->query($query);

if($mySqli->affected_rows > 0)
{

    while($row = $res->fetch_assoc())
    {
        $aaData[] = array(  
            $row['ID_IMAGEN'],
            $row['ID_ACTIVIDAD'],
            $row['URL_IMAGEN'],
            $row['ES_PRINCIPAL'],
            $row['NOMBRE_ACTIVIDAD'],
            $row['NOMBRE_TIPO_ATIVIDAD'],
            "<a class='btn btn-primary' href=\"javascript:editarImagen(".$row["ID_IMAGEN"].");\"><i class=\"glyphicon glyphicon-pencil\"></i> Editar</a>
             <a class='btn btn-danger' href=\"javascript:eliminarImagen(".$row["ID_IMAGEN"].");\"><i class=\"glyphicon glyphicon-trash\"></i> Eliminar</a>
            "
         );
     }
}

$aa = array(
     'sEcho' => 1,
        "iTotalRecords" => 0,
        "iTotalDisplayRecords" => 0,
        'aaData' => $aaData);
        
echo json_encode($aa);

?>