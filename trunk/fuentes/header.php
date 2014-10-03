<?php
require_once 'config/parametros.php';
//header('Content-type: text/html; charset=utf-8');
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
    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	<!-- Dialogos -->
	<script src="js/bootbox.min.js" type="text/javascript"></script>
    <!-- Redirect POST -->
    <script type="text/javascript" src="js/jquery.redirect.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style type="text/css">
    body {
        
        font-family: 'Droid Sans', Arial, Verdana, sans-serif;
        color: #828282;
        background: #f6f6f6 url(css/imagenes/body-bg.jpg);
        padding-top:0px;
        margin-top: 0px;
    }
    .fondo {
        background: url(css/imagenes/wr-bg.png) repeat-x center top;
    }
    .shadow{
        box-shadow:inset 0px 0px 85px rgba(0,0,0,1);
        -webkit-box-shadow:inset 0px 0px 85px rgba(0,0,0,1);
        -moz-box-shadow:inset 0px 0px 85px rgba(0,0,0,1);
    }
    img.shadow_photo{
        z-index: -1;
        position: relative;
    }
    .container {
        max-width: 960px;
    }
    #top-menu {
        background: none;
        border: none;
        text-align: center;
        padding-top: 5px;

    }
    #top-menu p a {
        color: #6c6c6c;
        text-decoration: none;
    }
    #glrFondoAlto {
        background-image: -webkit-linear-gradient(top,#5cb85c 0,#449d44 100%);
        background-image: -o-linear-gradient(top,#5cb85c 0,#449d44 100%);
        background-image: -webkit-gradient(linear,left top,left bottom,from(#5cb85c),to(#449d44));
        background-image: linear-gradient(to bottom,#5cb85c 0,#449d44 100%);
        border-top-left-radius:10px;
        border-top-right-radius:10px;
        border-bottom-left-radius:0px;
        border-bottom-right-radius:0px;
        height: 55px;
        max-width: 930px;
        z-index: -1000;
        position: relative;
    }
    #row-menu {
        /*background: url(css/imagenes/menu-bg.png) repeat-y center top;*/
        margin-bottom: -20px;
        z-index: +1000;
        height: 60px;
    }
    #row-menu a:hover {
        color: #000000;
    }
    #row-contacto {
        text-align: center;
        font: bold 13px Arial, Sans-Serif;
        color: #FFFFFF;
        font-size: 25px;
        padding: 25px;
        white-space: normal;
    }
    
    #top-1 {
        background: #ffffff; /* Old browsers */
        background: -moz-linear-gradient(top,  #ffffff 0%, #f1f1f1 50%, #e1e1e1 51%, #f6f6f6 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(50%,#f1f1f1), color-stop(51%,#e1e1e1), color-stop(100%,#f6f6f6)); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  #ffffff 0%,#f1f1f1 50%,#e1e1e1 51%,#f6f6f6 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  #ffffff 0%,#f1f1f1 50%,#e1e1e1 51%,#f6f6f6 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  #ffffff 0%,#f1f1f1 50%,#e1e1e1 51%,#f6f6f6 100%); /* IE10+ */
        background: linear-gradient(to bottom,  #ffffff 0%,#f1f1f1 50%,#e1e1e1 51%,#f6f6f6 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f6f6f6',GradientType=0 ); /* IE6-9 */
        height: 50px;
        text-align: center;
        max-width: 750px;
        margin-bottom: -20px;
        z-index: 1000;
        margin-left: auto;
        margin-right: auto;
        /*
         background-image:-webkit-gradient(linear, left top, right top, from(rgba(57, 194, 218, 0)), color-stop(0.35, rgba(57, 194, 218, 1)), to(rgba(57, 194, 218, 0)));
        background-image:-webkit-linear-gradient(left, rgba(57, 194, 218, 0), rgba(57, 194, 218, 1) 35%, rgba(57, 194, 218, 0));
        background-image: -moz-linear-gradient(left, rgba(57, 194, 218, 0), rgba(57, 194, 218, 1) 35%, rgba(57, 194, 218, 0));
        background-image: -ms-linear-gradient(left, rgba(57, 194, 218, 0), rgba(57, 194, 218, 1) 35%, rgba(57, 194, 218, 0));
        background-image: -o-linear-gradient(left, rgba(57, 194, 218, 0), rgba(57, 194, 218, 1) 35%, rgba(57, 194, 218, 0));
        background-image: linear-gradient(to right, rgba(57, 194, 218, 0), rgba(57, 194, 218, 1) 35%, rgba(57, 194, 218, 0));
         * 
         * */
        
        box-shadow: 0px 4px 16px #555555, 0px -4px 16px #555555;
        -webkit-box-shadow: 0px 0px 25px #666666;
        -moz-box-shadow: 0px 4px 16px #666666, 0px -4px 16px #666666;
    }
    #top-1 p a {
        color: #6c6c6c;
        text-decoration: none;
    }
    #top-1 a:hover {
        color: #000000;
    }
    #top-1 .navbar-text {
        float: none;
        margin-top: 8px;
    }


</style>
<script type="text/javascript">
	$(function() {
	    
	    $('#divLoading').hide();
    
        $("body").on({
            ajaxStart: function() { 
                $('#divLoading').show();
            },
            ajaxStop: function() { 
                $('#divLoading').hide();
            }    
        });
		
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
    
    function irDetalle(id) {
        event.preventDefault();
        $().redirect('detalleActividad.php', {'idActividad': id});
    }
</script>
</head>
<body>
    
<?php include 'loading.php'; ?>
    
    
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
		<div class="row" >
			<div class="col-xs-12" >
			    <div >
                    &nbsp;
                </div>
			</div>
		</div>
		<div class="row">
            <div class="col-xs-12 text-center">
                <div id="top-menu">
                    <div id="top-1">
                        <p class="navbar-text btn" id="pHome"><a href="#" style="color: #000000;">Home</a></p>
                        <p class="navbar-text btn" id="pContacto"><a href="#">Contacto</a></p>
                        <p class="navbar-text btn" id="pUbica"><a href="#">Ubicación</a></p>
                    </div>
                </div>
                <div id="glrFondoAlto">
                    &nbsp;
                </div>
            </div>
        </div>

