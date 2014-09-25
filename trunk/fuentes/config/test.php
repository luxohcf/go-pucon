<?php
require("parametros.php");

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
echo "<hr>";

    
?>