<?php
include 'header.php';
?>
<script type="text/javascript">
    $(function() {
        
        $("#btnEnviar").click(function () {
            // validar
            if(ValidarDatos()) {
				bootbox.dialog({
	              message: "Confirmar",
	              title: null,
	              buttons: {
	                Si: {
	                  label: "Si",
	                  className: "btn-success",
	                  callback: function() {
	                        $('#divLoading').show();
	                        $.post("./BO/CrearMensaje.php", $('#FormPrincipal').serialize(),
	                            function(data) {
	                                $('#divLoading').hide();
	                                var obj = jQuery.parseJSON(data);
	                                
	                                var msj = obj.html;
	                                var sub_msj = obj.errores; 
	                                var estado =  obj.estado;
	                                if(estado == 'OK') // Exito
	                                {	                                    
	                                    bootbox.dialog({
	                                    	message: msj,
								            title: null,
								            buttons: {
								            	Si: {
								            		label: "OK",
									                  className: "btn-success",
									                  callback: function() {
									                }
								            	}
								            }
	                                    });
	                                    Limpiar();
	                                }
	                                else // Error
	                                {
	                                    MostrarError(msj, sub_msj);
	                                }
	                        });
	                    }
	                },
	                No: {
	                  label: "No",
	                  className: "btn-info",
	                  callback: function() {
	                    
	                  }
	                }
	              }
	            });
            }
            event.preventDefault();
        });

        $("#btnlimpiar").click(function () {
            Limpiar();
        });
        
    });

	function ValidaCorreo(texto){                
        if (!/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(texto)) {
                return false;
        }
        return true;
    }
    
    function ValidaNumerico(texto){
        if (!/^[0-9]{1,10}$/.test(texto)) {
                return false;
        }
        return true;
    }
    
    function ValidaTexto(texto,longitud){
        var re = RegExp("^[a-zA-ZáéíóúÁÉÍÓÚñ0-9\s\'\-\.\#\_/ ]{1,"+longitud+"}$");
        if (!re.test(texto.trim())) {
                return false;
        }
        return true;
    }

	function ValidarDatos(){
      var errores = [];

      var txtNombreUsuario = $("#txtNombre").val();
      if(!ValidaTexto(txtNombreUsuario,100)){
        errores.push(" - El nombre es inválido.");
      }
      var txtCorreo = $("#txtEmail").val();
      if(!ValidaCorreo(txtCorreo)){
        errores.push(" - El correo es inválido.");
      }
      var txtAsunto = $("#txtAsunto").val();
      if(!ValidaTexto(txtAsunto,100)){
        errores.push(" - El asunto es inválido.");
      }
      var txtTelefono = $("#txtTelefono").val();
      if(!ValidaNumerico(txtTelefono)){
        errores.push(" - El número de telefóno es inválido.");
      } else {
          if(txtTelefono.length < 8){
              errores.push(" - El número de teléfono es inválido.");
          }
      }
      var txtComment = $("#txtComment").val();
      if(!ValidaTexto(txtComment,5000)){
        errores.push(" - Comentario inválido.");
      }
      // validar captcha


      if(errores.length > 0)
      {
        MostrarError("Datos incorrectos, ingrese nuevamente lo siguiente:",errores);
        return false;
      }
      else
      {
        return true;
      }
    }

	function MostrarAdvertencia(mensaje, array) {
        MostrarMensaje(mensaje, array, "");
    }

    function MostrarExito(mensaje, array) {
        MostrarMensaje(mensaje, array, "alert-success");
    }

    function MostrarError(mensaje, array) {
        MostrarMensaje(mensaje, array, "alert-error");
    }

    function MostrarMensaje(mensaje, array, tipo) {
        var msj = "<div class='alert " + tipo + "'><button type='button' class='close' data-dismiss='alert'>&times;</button>";
        msj = msj + "<strong>" + mensaje + "</strong>";

        if (array != null) {
                array.forEach(function(entry) {
                        msj = msj + "<p>" + entry + "</p>";
                });
        }

        $('#divErrores').html(msj);
    }

    function Limpiar() {
    	$("#txtNombre").val("");
        $("#txtEmail").val("");
        $("#txtAsunto").val("");
        $("#txtTelefono").val("");
        $("#txtComment").val("");
        $('#divErrores').html("");
    }
</script>
<hr>
<!-- Actividades y publicidad -->
<div class="row">
	<!-- Columna izquierda -->
	<div class="col-md-8">
		<div class="container-fluid">
			<div class="row">
			  <form class="form-horizontal" name="commentform" id="FormPrincipal" action="#">
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
		    		<div id="divErrores" style="width: 60%;" class="text-danger"></div>
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
