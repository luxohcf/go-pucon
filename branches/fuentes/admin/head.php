<?php
@session_start();
// si no se ha iniciado sesiòn
if(isset($_SESSION['usuario']) != TRUE)
{
    // si no ha iniciado sesiòn mostrar el login
    header("Location: logout.php");
    exit();
}

require_once '../config/parametros.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?php echo $V_TITULO; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- jQuery Version 1.11.0 -->
    <script src="../js/jquery-1.11.0.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Dialogos -->
    <script src="../js/bootbox.min.js" type="text/javascript"></script>
    <!-- Redirect POST -->
    <script type="text/javascript" src="../js/jquery.redirect.min.js"></script>
    <!-- DataTable plugin -->
    <script type="text/javascript" src="../js/DT/jquery.dataTables.js"></script>
    <!--script type="text/javascript" src="../js/dataTables.bootstrap.js"></script-->
    <script type="text/javascript" src="../js/genericos.js"></script>

    <style type="text/css" title="currentStyle">
        @import "../css/DT/demo_page.css";
        @import "../css/DT/demo_table.css";
        @import "../css/DT/demo_table_jui.css";
        @import "../css/DT/jquery.dataTables_themeroller.css";
        
    </style>    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->