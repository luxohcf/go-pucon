<?php
require_once 'config/parametros.php';

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
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/heroic-features.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<style type="text/css">
		.gris {
			background-color: #eee
		}
		#rowVerde {
			margin-top: -40px;
			height: 60px;
			z-index: -1; 
		}
        #top-menu {
            background: none;
            border: none;
            display: inline-block;
            padding-top: 5px;
            z-index: 20;
        }
        #top-menu p a {
            color: #6c6c6c;
            text-decoration: none;
        }
        #row-menu {
            background: url(css/imagenes/menu-bg.png) repeat-y center top;
        }
        #row-contacto {
            font: bold 13px Arial, Sans-Serif;
        }
        .fondo {
            background: url(css/imagenes/wr-bg.png) repeat-x center top;
        }

        body {
            
            font-family: Georgia, serif;
            background: #f6f6f6 url(css/imagenes/body-bg.jpg);
            padding-top:0px;
            margin-top: 0px;
        }

	</style>
	<script type="text/javascript">
		$(function() {
			
			$("#pContacto").click(function(){
				irContacto();
			});
			
			$("#pUbica").click(function(){
				window.location.href = "ubicacion.php";
			});
			
			$("#pHome").click(function(){
				window.location.href = "index.php";
			});
			
			$("#pUbica").mouseover(function () {
			    $("#pUbica").addClass('pSeleccionado');
			});
			
			

		});
		
		function volver() {
			javascript:history.go(-1);
		}
		
		function irContacto() {
			window.location.href = "contacto.php";
		}
		
		function irA(dir) {
            
            window.location.replace(dir);
        }
	</script>
</head>
<body>
    <div class="fondo">
    <!-- Page Content -->
    <div class="container">
		<!-- Logo -->
		<div class="row">
			<div class="col-lg-12 text-center" >
				<img src="<?php echo $V_LOGO_GRANDE; ?>" alt="" id="logo">
			</div>
		</div>

		<!-- Menu -->
		<div class="row" id="row-menu">
			<div class="col-lg-12 text-center" >
				<nav class="navbar navbar-default" role="navigation" id="top-menu">
					<p class="navbar-text btn" id="pHome"><a href="#" style="color: #000000;">Home</a></p>
					<p class="navbar-text btn" id="pContacto"><a href="#">Contacto</a></p>
					<p class="navbar-text btn" id="pUbica"><a href="#">Ubicación</a></p>
				</nav>
			</div>
		</div>
		<!--<div class="row">  Barra verde 
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center btn btn-success" id="rowVerde" >
				&nbsp;
			</div>
		</div>-->
