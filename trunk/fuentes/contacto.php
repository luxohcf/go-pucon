<?php
include 'header.php';
?>
<script type="text/javascript">
    $(function() {
        
        $("#btnEnviar").click(function () {
            // validar
            
            // llamar post
            
            // mostrar mensaje
            
            // ir al home
        });
        $("#btnlimpiar").click(function () {
            $("#txtNombre").val("");
            $("#txtEmail").val("");
            $("#txtAsunto").val("");
            $("#txtTelefono").val("");
            $("#txtComment").val("");
        });
        
    });
</script>
<hr>
<!-- Actividades y publicidad -->
<div class="row">
	<!-- Columna izquierda -->
	<div class="col-md-8">
		<div class="container-fluid">
			<div class="row">
			  <form class="form-horizontal" name="commentform">
			  	<div class="form-group">
			  		<h3><strong>Contacto <?php echo $V_TITULO; ?></strong></h3>
		  		</div>
			    <div class="form-group">

					<div class="input-group">
					  <span class="input-group-addon glyphicon glyphicon-user"></span>
					  <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre"/>
					</div>
					
					<div class="input-group">
					  <span class="input-group-addon glyphicon glyphicon-envelope"></span>
					  <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email"/>
					</div>
					
					<div class="input-group">
					  <span class="input-group-addon glyphicon glyphicon-tag"></span>
					  <input type="text" class="form-control" id="txtAsunto" name="txtAsunto" placeholder="Asunto"/>
					</div>

					<div class="input-group">
					  <span class="input-group-addon glyphicon glyphicon-phone"></span>
					  <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Telefono"/>
					</div>
		        </div>
			    <div class="form-group">
			    	
			        <div class="col-md-12">
			            <textarea rows="6" class="form-control" id="txtComment" name="txtComment" placeholder="..."></textarea>
			        </div>
			    </div>
			    <div class="form-group">
			    	<!-- captcha -->
			    	<img src="http://placehold.it/120x50" alt="">
			    	<button type="submit" class="btn btn-success">
			    		<span class="glyphicon glyphicon-refresh"></span>
			    	</button>
		    	</div>
		    	<div class="form-group">
			    	<div class="input-group">
					  <span class="input-group-addon glyphicon glyphicon-arrow-right"></span>
					  <input type="text" class="form-control" id="txtCaptcha" name="txtCaptcha" placeholder="Ingrese el texto de la imagen"/>
					</div>
		    	</div>
			    <div class="form-group">
			    	
			    	<div class="btn-group btn-group-lg">
					  <button type="submit" class="btn btn-success" id="btnEnviar">Enviar</button>
					  <button type="button" class="btn btn-success" id="btnlimpiar">Limpiar</button>
					  <button type="button" class="btn btn-success" onclick="volver();">Volver</button>
					</div>

			    </div>
			</form>
			</div><!-- /row -->

		</div>
	</div>
<?php
include 'publicidad.php';
?>	
	
</div>
				
<?php
include 'footer.php';
?>
