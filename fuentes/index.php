<?php
include 'header.php';

$obj = new Utilidades($V_HOST,$V_USER,$V_PASS,$V_BBDD);
$actividades = $obj->ObtenerActividades();
 
?>

<style type="text/css">
    #glrFondoAlto {
        /*background: url(css/imagenes/glr-fondo-alto.png) repeat-x center top;*/
   		background-image: -webkit-linear-gradient(top,#5cb85c 0,#449d44 100%);
		background-image: -o-linear-gradient(top,#5cb85c 0,#449d44 100%);
		background-image: -webkit-gradient(linear,left top,left bottom,from(#5cb85c),to(#449d44));
		background-image: linear-gradient(to bottom,#5cb85c 0,#449d44 100%);
		border-top-left-radius:10px;
		border-top-right-radius:10px;
		border-bottom-left-radius:0px;
		border-bottom-right-radius:0px;
        height: 60px;
    }
    #glrFondoBajo {
        /*background: url(css/imagenes/glr-fondo-bajo.png) repeat-x center top;*/
        background-image: -webkit-linear-gradient(top,#F5F5F5 0,#C1E2B3 100%);
		background-image: -o-linear-gradient(top,#F5F5F5 0,#C1E2B3 100%);
		background-image: -webkit-gradient(linear,left top,left bottom,from(#F5F5F5),to(#C1E2B3));
		background-image: linear-gradient(to bottom,#F5F5F5 0,#C1E2B3 100%);
        height: 90px;
        border-top-left-radius:0px;
		border-top-right-radius:0px;
		border-bottom-left-radius:10px;
		border-bottom-right-radius:10px;
        
    }
    #glrFondoBajo .carousel-indicators {
        bottom: -20px;
        position: relative;
    }
    #glrFondoBajo .carousel-control .glyphicon-chevron-right, #glrFondoBajo .carousel-control .glyphicon-chevron-left{
        margin-top: 30px;
    }
    #glrFondoBajo .carousel-control .glyphicon-chevron-right {
        margin-right: 30px;
    }
    #glrFondoBajo .carousel-control .glyphicon-chevron-left {
        margin-left: 30px;
    }
    .carousel-caption {
        right: 0%;
        left: 10%; 
        bottom: 0px;
        height: 90%;
        width: 40%;
    }
    
    .carousel-caption h2 {
    	color: #FFFFFF;
		letter-spacing: -1px;
		line-height: 1em;
		font-weight: normal;
		font-family: Georgia, serif;
    }
    
    .carousel-caption p {
		font-size: 16px;
    }
    .carousel-inner img {
    	height: 100%;
        width: 100%;
    }
	
	.img-thumbnail {
		height: 60px;
        width: 60px;
	}

</style>

<!-- Nueva galeria -->
<div class="row" id="glrFondoAlto">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
<?php 
      $flag = 0;  
      foreach ($actividades as $actividad) { ?>
              	
            <div class="item 
<?php if ($flag == 0) {
                echo "active";
            }
            $flag = 1; 
?> ">
              
              <div class="shadow">
              	<img src="<?php echo $actividad["IMAGEN_RESUMEN"]; ?>" alt="" class="shadow_photo img-responsive" >
              </div>
                  <div class="carousel-caption hidden-xs">
                    <div class="text-center">
                        <h2 class="title"><?php echo $actividad["NOMBRE_ACTIVIDAD"]; ?></h2>
                        <p class="text-left"><?php echo $actividad["RESUMEN"]; ?></p>
                        <div>&nbsp;</div>
                        <p class="text-center">
                            <a href="#" onclick="irDetalle('<?php echo $actividad["ID_ACTIVIDAD"]; ?>');" class="btn btn-default">
                                <strong>VER DETALLES</strong>
                            </a>
                        </p>
                    </div>
                  </div>
            </div>
<?php } ?>

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
<div class="hidden-xs">
<div class="row" id="glrFondoBajo" >
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center " >


          <div class="carousel-indicators">
<?php $cont = 0;
foreach ($actividades as $actividad) { ?>
                <a href="#" class="">
                <img src="<?php echo $actividad["IMAGEN_RESUMEN_CHICA"]; ?>" alt="" data-target="#carousel-example-generic" data-slide-to="<?php echo "$cont"; ?>" 
                class="img-thumbnail">
                </a>
<?php
$cont++; 
}?>

          </div>
      </div>
</div>
</div>

<!-- Contacto -->
<div class="row" >
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 btn btn-success active text-center" onclick="irContacto();">
    <div id="row-contacto">
    <?php echo $V_TEXTO_CONTACTO; ?>
    </div>
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