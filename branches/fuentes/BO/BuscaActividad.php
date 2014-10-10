<?php
require("../config/parametros.php");

$aaData = array();
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
            $row['ID_ACTIVIDAD'],
            $row['ID_TIPO_ACTIVIDAD'],
            $row['NOMBRE_ACTIVIDAD'],
            $row['NOMBRE_TIPO_ATIVIDAD'],
            $row['RESUMEN'],
            $row['DESCRIPCION'],
            $row['IMAGEN_RESUMEN'],
            $row['IMAGEN_RESUMEN_CHICA'],
            $row['URL_WEB'],
            ($row['ACTIVA'] == "1") ? "Activa" : "Inactiva",
            "<a class='btn btn-primary' href=\"javascript:editarActividad(".$row["ID_ACTIVIDAD"].");\"><i class=\"glyphicon glyphicon-pencil\"></i> Editar</a>
             <a class='btn btn-danger' href=\"javascript:eliminarActividad(".$row["ID_ACTIVIDAD"].");\"><i class=\"glyphicon glyphicon-trash\"></i> Eliminar</a>
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