<?php
require_once("../config/parametros.php");

$pass   = $_POST['pass'];
$id     = str_replace(" ", "", $_POST['name']);

$data = array();

if($pass == $V_ADMIN_PASS && $id == $V_ADMIN_ID) // Si los datos son validos
{

    @session_start(); // Guardo la sesion
    $_SESSION['usuario'] = $V_ADMIN_ID;
    $data["error"] = FALSE;

}
else /* Si no lo son retornar un mensaje */
{
    $data["html"] = "- Debe ingresar un RUT y/o Contraseña válida.";  
    $data["error"] = TRUE;
}

echo json_encode($data);

?>