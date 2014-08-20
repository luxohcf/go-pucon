<?php

require_once 'parametros.php';

$obj = new Utilidades($V_HOST,$V_USER,$V_PASS,$V_BBDD);
$actividades = $obj->ObtenerActividades();

var_dump($obj->ObtenerActividades());

?>