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
	<!-- Dialogos -->
	<script src="js/bootbox.min.js" type="text/javascript"></script>
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
        #top-menu {
            background: none;
            border: none;
            display: inline-block;
            padding-top: 5px;
        }
        #top-menu p a {
            color: #6c6c6c;
            text-decoration: none;
        }
        #row-menu {
            background: url(css/imagenes/menu-bg.png) repeat-y center top;

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
        .fondo {
            background: url(css/imagenes/wr-bg.png) repeat-x center top;
        }

        body {
            
            font-family: 'Droid Sans', Arial, Verdana, sans-serif;
            color: #828282;
            background: #f6f6f6 url(css/imagenes/body-bg.jpg);
            padding-top:0px;
            margin-top: 0px;
            
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
        
        function mostrarActividad(id) {
            // poner display nones a todos los <div class="slide"
            $("div .slide").hide();
            
            // quiter el display none al id="slide-id
            $("#slide-" + id).show();
            // mover la flexa
            event.preventDefault();
        }
	</script>
<style type="text/css">

#divLoading{
  position: fixed;
  _position: absolute;
  z-index: 99;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  opacity:0.6;
  background-color:#ffffff;
  _height: expression(document.body.offsetHeight + "px");
}

.bubblingG {
    text-align: center;
    width:150px;
    height:94px;
}

.bubblingG span {
    display: inline-block;
    vertical-align: middle;
    width: 19px;
    height: 19px;
    margin: 47px auto;
    background: #1E93C9;
    -moz-border-radius: 94px;
    -moz-animation: bubblingG 1.3s infinite alternate;
    -webkit-border-radius: 94px;
    -webkit-animation: bubblingG 1.3s infinite alternate;
    -ms-border-radius: 94px;
    -ms-animation: bubblingG 1.3s infinite alternate;
    -o-border-radius: 94px;
    -o-animation: bubblingG 1.3s infinite alternate;
    border-radius: 94px;
    animation: bubblingG 1.3s infinite alternate;
}

#bubblingG_1 {
    -moz-animation-delay: 0s;
    -webkit-animation-delay: 0s;
    -ms-animation-delay: 0s;
    -o-animation-delay: 0s;
    animation-delay: 0s;
}

#bubblingG_2 {
    -moz-animation-delay: 0.39s;
    -webkit-animation-delay: 0.39s;
    -ms-animation-delay: 0.39s;
    -o-animation-delay: 0.39s;
    animation-delay: 0.39s;
}

#bubblingG_3 {
    -moz-animation-delay: 0.78s;
    -webkit-animation-delay: 0.78s;
    -ms-animation-delay: 0.78s;
    -o-animation-delay: 0.78s;
    animation-delay: 0.78s;
}

@-moz-keyframes bubblingG {
    0% {
    width: 19px;
    height: 19px;
    background-color:#1E93C9;
    -moz-transform: translateY(0);
    }
    100% {
    width: 45px;
    height: 45px;
    background-color:#FFFFFF;
    -moz-transform: translateY(-39px);
    }
}

@-webkit-keyframes bubblingG {
    0% {
    width: 19px;
    height: 19px;
    background-color:#1E93C9;
    -webkit-transform: translateY(0);
    }
    100% {
    width: 45px;
    height: 45px;
    background-color:#FFFFFF;
    -webkit-transform: translateY(-39px);
    }
}

@-ms-keyframes bubblingG {
    0% {
    width: 19px;
    height: 19px;
    background-color:#1E93C9;
    -ms-transform: translateY(0);
    }
    100% {
    width: 45px;
    height: 45px;
    background-color:#FFFFFF;
    -ms-transform: translateY(-39px);
    }
}

@-o-keyframes bubblingG {
    0% {
    width: 19px;
    height: 19px;
    background-color:#1E93C9;
    -o-transform: translateY(0);
    }
    100% {
    width: 45px;
    height: 45px;
    background-color:#FFFFFF;
    -o-transform: translateY(-39px);
    }
}

@keyframes bubblingG {
    0% {
    width: 19px;
    height: 19px;
    background-color:#1E93C9;
    transform: translateY(0);
    }
    100% {
    width: 45px;
    height: 45px;
    background-color:#FFFFFF;
    transform: translateY(-39px);
    }
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
</style>
</head>
<body>
    
<div id="divLoading">
    <center>
    <div class="bubblingG" style="top: 30%;position: absolute;left: 45%;" >
        <span id="bubblingG_1"></span>
        <span id="bubblingG_2"></span>
        <span id="bubblingG_3"></span>
    </div>
    </center>
</div>
    
    
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

