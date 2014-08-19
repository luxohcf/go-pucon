<?php
include 'header.php';
?>

<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center " id="featured" >
    <div id="slides">
        <div class="slide" >
            <img src="http://corretajesur.cl/wp-content/uploads/2014/02/DSCN12743-280689_640x289.jpg" 
            alt="" />
            <div class="overlay"></div>
            <div class="description">
                <div class="slide-info">
                    <h2 class="title">Pucon Rafting</h2>
                    <div class="hr"></div>
                    <p class="text-left">Ejecutamos dos tramos del río Trancura (Trancura alto grado IV, y Trancura baj grado III).</p>
                    <div>&nbsp;</div>
                    <p class="text-center">
                        <a href="detalleActividad.php?id=1" class="btn btn-default">
                            <strong>VER DETALLES</strong>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<!-- Galeria fotografica principal 
<div class="row">
<div class="col-lg-12">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">-->


  <!-- Wrapper for slides 
  <div class="carousel-inner">
	<div class="item active">
	  <img src="http://placehold.it/1200x300" alt="">

	</div>
	<div class="item">
	  <img src="http://placehold.it/1200x300" alt="">

	</div>
  </div>-->

  <!-- Controls 
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
	<span class="glyphicon glyphicon-chevron-left"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
	<span class="glyphicon glyphicon-chevron-right"></span>
  </a>
</div>
</div>
</div>
<hr>-->
<!-- Contacto -->
<div class="row" id="row-contacto">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-success active text-center" onclick="irContacto();">
    <?php echo $V_TEXTO_CONTACTO; ?>
</div>
</div>
<hr>
<!-- Actividades y publicidad -->
<div class="row">
<!-- Columna izquierda -->
<div class="col-md-8">
	<div class="container-fluid">
	<!-- fila de actividades -->
	
<?php
    // Genera actividades
    $obj = new Utilidades($V_HOST,$V_USER,$V_PASS,$V_BBDD);
    echo $obj->GeneraActividades();

?>

	<!-- Fin fila de actividades -->
	</div>
</div>

<?php
include 'publicidad.php';
?>

</div>
<?php
include 'footer.php';
?>