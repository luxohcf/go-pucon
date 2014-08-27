<?php
include 'header.php';

$obj = new Utilidades($V_HOST,$V_USER,$V_PASS,$V_BBDD);
$actividades = $obj->ObtenerActividades();
 
?>

<style type="text/css">
    #glrFondoAlto {
        background: url(css/imagenes/glr-fondo-alto.png) repeat-x center top;
        height: 60px;
    }
    #glrFondoBajo {
        background: url(css/imagenes/glr-fondo-bajo.png) repeat-x center top;
        height: 90px;
        
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
        left: 0%;
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
                <div class="item active">
                  <img src="http://placehold.it/1200x500" alt="">
                  <div class="carousel-caption">
                    <div>
                        <h2 class="title">xx</h2>
                        <div class=""></div>
                        <p class="text-left">xxxxxx</p>
                        <div>&nbsp;</div>
                        <p class="text-center">
                            <a href="#" class="btn btn-default">
                                <strong>VER DETALLES</strong>
                            </a>
                        </p>
                    </div>
                  </div>
                </div>
                <div class="item">
                  <img src="http://placehold.it/1200x500" alt="">
                  <div class="carousel-caption">
                    ...
                  </div>
                </div>
              </div>

            </div>
    </div>
</div>
<div class="row" id="glrFondoBajo">
    <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12">
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
          </a>
    </div>
    <div class="col-lg-10 col-md-8 col-sm-12 col-xs-12 text-center "  >

          <div class="carousel-indicators">
                <a href="#" class="">
                <img src="http://placehold.it/50x50" alt="" data-target="#carousel-example-generic" data-slide-to="0" 
                class="img-thumbnail">
                </a>
           
           <a href="#" class="">
                <img src="http://placehold.it/50x50" alt="" data-target="#carousel-example-generic" data-slide-to="1" 
                class="img-thumbnail">
           </a>

          </div>
          
      </div>
      <div class="col-lg-1 col-md-2 col-sm-12 col-xs-12">
          <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
          </a>
      </div>
</div>


<hr />
<hr />
<!-- Galeria -->
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center " id="featured" >
    <div id="slides">
    <?php 
      $flag = 0;  
      foreach ($actividades as $actividad) { ?>
        <div class="slide" id="slide-<?php echo $actividad["ID_ACTIVIDAD"]; ?>" 
            <?php if ($flag == 1) {
                echo "style=\"display:none;\"";
            }
            $flag = 1; ?> 
            >
            <img src="<?php echo $actividad["IMAGEN_RESUMEN"]; ?>" 
            alt="" />
            <div class="overlay"></div>
            <div class="description">
                <div class="slide-info">
                    <h2 class="title"><?php echo $actividad["NOMBRE_ACTIVIDAD"]; ?></h2>
                    <div class="hr"></div>
                    <p class="text-left"><?php echo $actividad["RESUMEN"]; ?></p>
                    <div>&nbsp;</div>
                    <p class="text-center">
                        <a href="<?php echo $actividad["URL_WEB"]; ?>" class="btn btn-default">
                            <strong>VER DETALLES</strong>
                        </a>
                    </p>
                </div>
            </div>
        </div>
    <?php }?>
    </div>
    
    <div id="controllers">
        <a href="#" id="left-arrow" class="btn">Previous</a>
        <?php foreach ($actividades as $actividad) { ?>
            <a href="#" class="smallthumb" id="a-<?php echo $actividad["ID_ACTIVIDAD"]; ?>"
                onclick="mostrarActividad('<?php echo $actividad["ID_ACTIVIDAD"]; ?>');" >
                <img src="<?php echo $actividad["IMAGEN_RESUMEN_CHICA"]; ?>" 
                alt="" >
            </a>
        <?php }?>
        <a href="#" id="right-arrow">Next</a>
        <!-- comentado mientras
        <span id="active-arrow"></span> -->
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