<?php
include 'header.php';

$obj = new Utilidades($V_HOST,$V_USER,$V_PASS,$V_BBDD);
$actividades = $obj->ObtenerActividades();
 
?>
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