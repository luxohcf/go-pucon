<?php
require("../config/parametros.php");

$aaData = array();
$query = "SELECT ID_CLIENTE, 
                NOMBRE, 
                EMAIL, 
                TELEFONO, 
                ASUNTO, 
                COMENTARIO, 
                FECHA_CREACION 
          FROM TBL_CLIENTES
          ORDER BY FECHA_CREACION";

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
            $row['ID_CLIENTE'],
            $row['NOMBRE'],
            $row['EMAIL'],
            $row['TELEFONO'],
            $row['ASUNTO'],
            $row['COMENTARIO'],
            $row['FECHA_CREACION']
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