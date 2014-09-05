<?php

@session_start();
// si no se ha iniciado sesiòn
if(isset($_SESSION['usuario']) != TRUE)
{
    header("Location: logout.php");
    exit();
}
// si no ha iniciado sesiòn mostrar el login
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
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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

		});
		
		function volver() {
			javascript:history.go(-1);
		}
		
		function irA(dir) {
            
            window.location.replace(dir);
        }

	</script>
<style type="text/css">

#divLoading {
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
img.shadow_photo {
	z-index: -1;
	position: relative;
}
.container {
	padding-top: 5px;
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

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><?php echo $V_TITULO; ?></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Actividades</a></li>
            <li><a href="#about">Imagenes</a></li>
            <li><a href="#contact">Tipo Actividad</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
</div>

<div class="container">
	<!-- menu -->
	<div class="row">
		<form class="form-horizontal" name="commentform" id="FormPrincipal" action="#">
		  	<div class="form-group">
		  		<h3><strong>Datos Actividad</strong></h3>
	  		</div>
	  		<div class="form-group">
		  		<h3><strong>Datos Actividad</strong></h3>
	  		</div>
		    <div class="form-group">
				<div class="input-group">
					<!-- NOMBRE_ACTIVIDAD -->
				  <span class="input-group-addon glyphicon glyphicon-user"></span>
				  <input type="text" class="form-control" id="txtNombreActividad" name="txtNombreActividad" placeholder="Nombre"/>
				  <span class="help-block" style="display: none;">Ingresar nombre de la actividad</span>
				</div>
				
				<div class="input-group">
					<!-- RESUMEN -->
				  <span class="input-group-addon glyphicon glyphicon-pencil"></span>
				  <input type="text" class="form-control" id="txtResumenActividad" name="txtResumenActividad" placeholder="Resumen"/>
				  <span class="help-block" style="display: none;">Ingresar resumen de la actividad</span>
				</div>

				<div class="input-group">
					<!-- ID_TIPO_ACTIVIDAD -->
				</div>
				
				<div class="input-group">
					<!-- DESCRIPCION -->
					<div class="col-xs-12">
						<span class="input-group-addon glyphicon glyphicon-tag"></span>
			            <textarea rows="6" class="form-control" id="txtDescripcionActividad" name="txtDescripcionActividad" placeholder="Descripción"></textarea>
			            <span class="help-block" style="display: none;">Ingresar descripción de la actividad</span>
			        </div>
				</div>

				<div class="input-group">
					<!-- IMAGEN_RESUMEN -->
				  <span class="input-group-addon glyphicon glyphicon-picture"></span>
				  <input type="text" class="form-control" id="txtImgResumenActividad" name="txtImgResumenActividad" placeholder="URL Imagen resumen"/>
				  <span class="help-block" style="display: none;">Ingresar URL Imagen resumen de la actividad</span>
				</div>

				<div class="input-group">
					<!-- IMAGEN_RESUMEN_CHICA -->
				  <span class="input-group-addon glyphicon glyphicon-picture"></span>
				  <input type="text" class="form-control" id="txtImgResumenChicaActividad" name="txtImgResumenChicaActividad" placeholder="URL Imagen resumen pequeña"/>
				  <span class="help-block" style="display: none;">Ingresar URL Imagen resumen pequeña de la actividad</span>
				</div>

				<div class="input-group">
					<!-- URL_WEB -->
				  <span class="input-group-addon glyphicon glyphicon-globe"></span>
				  <input type="text" class="form-control" id="txtURLActividad" name="txtURLActividad" placeholder="URL"/>
				  <span class="help-block" style="display: none;">Ingresar URL de la actividad</span>
				</div>
				<div class="input-group">
					<!-- ACTIVA -->
					<span class="input-group-addon glyphicon glyphicon-check"></span>
				    <input type="checkbox" class="form-control" id="txtActivaActividad" name="txtActivaActividad" placeholder="" />
				</div>
	        </div>
		    <div class="form-group">
		    	<div class="btn-group btn-group-lg">
		    	  <button type="button" class="btn btn-success" id="btnlimpiar">Crear</button>
				  <button type="submit" class="btn btn-success" id="btnEnviar">Guardar</button>
				  <button type="button" class="btn btn-success" id="btnlimpiar">Limpiar</button>
				</div>
		    </div>
		    <div class="hidden">
		    	<!-- ID_ACTIVIDAD -->
		    	<input type="text" class="form-control" id="hdnIdActividad" name="hdnIdActividad" placeholder=""/>
		    </div>
		</form>
	</div>
	<!-- campo -->
	<hr>
	<!-- tabla -->
	<div class="row">
		<div class="col-xs-12">
			<table>
				<thead>
					<th>xx</th>
					<th>xx</th>
					<th>xx</th>
				</thead>
				<tbody>
					<tr>
						<td>xx</td>
						<td>xx</td>
						<td>xx</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

	<hr>
	<div>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Desarrollado por Luxo - 2014</p>
                </div>
            </div>
        </footer>
    </div>
    <!-- /.container -->
    </div>
</body>
</html>
