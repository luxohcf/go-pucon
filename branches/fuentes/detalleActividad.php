<?php
include 'header.php';
$idActividad = $_POST["idActividad"];

// validar si existe la actividad
$obj = new Utilidades($V_HOST,$V_USER,$V_PASS,$V_BBDD);
$actividad = $obj->ObtenerActividad($idActividad);

// si no mostrar error
if (is_bool($actividad) && $actividad == FALSE) {
    header("Location: index.php");
    exit();
}

?>
<style type="text/css">
    .carousel-inner img {
    	height: 100%;
        width: 100%;
    }
    #divDetalle {
    	background-color: #FFFFFF;
    }
</style>
<!-- Galeria -->
<div class="row">
	<div class="col-lg-12">
	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	  <!-- Wrapper for slides -->
	  <div class="carousel-inner">
	      
	    <?php
	        // Por cada imagen
            echo $obj->GeneraGaleriaActividad($idActividad);
	    ?>

	  </div>
	
	  <!-- Controls -->
	  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left"></span>
	  </a>
	  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right"></span>
	  </a>
	</div>
	</div>
</div>
<hr>
<!-- Actividades y publicidad -->
<div class="row">
	<!-- Columna izquierda -->
	<div class="col-md-8">
		<div class="container-fluid">

			<!-- Detalle -->
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="divDetalle">
					<h4><p class="text-center"><strong><?php echo $actividad["NOMBRE_ACTIVIDAD"] ?></strong></p></h4>
					<hr>
					<?php echo $actividad["DESCRIPCION"]; ?>
					<div>
					&nbsp;
					</div>
					<hr>
					<div class="btn-group btn-group-lg">
					  <button type="button" class="btn btn-success" onclick="volver();">Volver</button>
					  <button type="button" class="btn btn-default" onclick="irContacto();" >Contactanos</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php
include 'publicidad.php';
?>	
	
</div>
				
<?php
include 'footer.php';
?>