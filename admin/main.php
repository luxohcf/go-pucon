<?php include 'head.php'; ?>

<script type="text/javascript">
    var oTabla = null;

	$(function() {
	    // comenzar con el boton crear habilitado
	    $('#btnEnviar').prop('disabled', true);
	    // comenzar con el boton guardar deshabilitado
	    $('#divLoading').hide();

        $("body").on({
            ajaxStart: function() { 
                $('#divLoading').show();
            },
            ajaxStop: function() { 
                $('#divLoading').hide();
            }    
        });
        
        $('.btn[data-radio-name]').click(function() {
		    $('.btn[data-radio-name="'+$(this).data('radioName')+'"]').removeClass('active');
		    $('input[name="'+$(this).data('radioName')+'"]').val(
		        $(this).text()
		    );
		});
		
		oTabla = $('#tblResultados').dataTable({
            bJQueryUI : true,
            sPaginationType : "full_numbers", //tipo de paginacion
            "bFilter" : false, // muestra el cuadro de busqueda
            "iDisplayLength" : 5, // cantidad de filas que muestra
            "bLengthChange" : false, // cuadro que deja cambiar la cantidad de filas
            "oLanguage" : {// mensajes y el idio,a
                "sLengthMenu" : "Mostrar _MENU_ registros",
                "sZeroRecords" : "No hay resultados",
                "sInfo" : "Resultados del _START_ al _END_ de _TOTAL_ registros",
                "sInfoEmpty" : "0 Resultados",
                "sInfoFiltered" : "(filtrado desde _MAX_ registros)",
                "sInfoPostFix" : "",
                "sSearch" : "Buscar:",
                "sUrl" : "",
                "sInfoThousands" : ",",
                "sLoadingRecords" : "Cargando...",
                "oPaginate" : {
                    "sFirst" : "Primero",
                    "sLast" : "Último",
                    "sNext" : "Siguiente",
                    "sPrevious" : "Anterior"
                }
            },
            "bProcessing" : true, //para procesar desde servidor
            "sServerMethod" : "POST",
            "sAjaxSource" : '../BO/BuscaActividad.php', // fuente del json
            "fnServerData" : function(sSource, aoData, fnCallback) {// Para buscar con el boton
                $.ajax({
                    "dataType" : 'json',
                    "type" : "POST",
                    "url" : sSource,
                    "data" : $('#FormPrincipal').serialize(),
                    "success" : fnCallback
                });
            }
        });
		
		$("#btnlimpiar").click(function(){
			Limpiar();
		});
		
		$("#btnCrear").click(function(){
			// llamar al guardar
			$("#hdnIdActividad").val("");
			crearActividad();
		});
		
		$("#btnEnviar").click(function(){
			// habilitarlo solo si se selecciono un elemento de la tabla
			crearActividad();
            event.preventDefault();
		});
		
		oTabla.fnSetColumnVis(0, false ); // id
		oTabla.fnSetColumnVis(1, false ); // id_tipo
		oTabla.fnSetColumnVis(4, false ); // resumen
		oTabla.fnSetColumnVis(5, false ); // descrip
		oTabla.fnSetColumnVis(6, false ); // img_res
		oTabla.fnSetColumnVis(7, false ); // img_res_chic
		oTabla.fnSetColumnVis(8, false ); // url

	});
	
	function crearActividad() {
		if(ValidarDatos()) {
			var mensaje = "Seguro que desea crear la actividad?";	
			if ($("#hdnIdActividad").val() != "") {
				mensaje = "Seguro que desea guardar la actividad?";
			}
			bootbox.dialog({
              message: mensaje,
              title: null,
              buttons: {
                Si: {
                  label: "Si",
                  className: "btn-success",
                  callback: function() {
                        $('#divLoading').show();
                        $.post("../BO/CrearActividad.php", $('#FormPrincipal').serialize(),
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
                                   if (oTabla != null) {
                                         oTabla.fnReloadAjax();
                                    }
                                }
                                else // Error
                                {
                                    bootbox.dialog({
                                    	message: msj,
							            title: null,
							            buttons: {
							            	Si: {
							            		label: "Cerrar",
								                  className: "btn-success",
								                  callback: function() {
								                }
							            	}
							            }
                                    });
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
	}
	
	function Limpiar() {
		$("#txtResumenActividad").val("");
		$("#txtNombreActividad").val("");
		$("#txtIdTipoActividad").val('0');

		$("#txtDescripcionActividad").val("");
		$("#txtImgResumenActividad").val("");
		$("#txtImgResumenChicaActividad").val("");
		$("#txtURLActividad").val("");
		// cambiar por el setear active 
		$("#txtActivaActividad").val("Activa");
		$('.btn[data-radio-name="txtActivaActividad"]').removeClass('active');
		$("#btnActivo").addClass('active');
		$("#hdnIdActividad").val("");

		// deshabilitar el guardar
		$('#btnEnviar').prop('disabled', true);
		$('#btnCrear').prop('disabled', false);
		
		$('#FormPrincipal .help-block').hide();
        $('#FormPrincipal .input-group').removeClass('has-error');
	}
	
	function irA(dir) {
        
        window.location.replace(dir);
    }
    
    function eliminarActividad(id) {
        bootbox.dialog({
          message: "Seguro que desea eliminar la actividad?",
          title: null,
          buttons: {
            Si: {
              label: "Si",
              className: "btn-success",
              callback: function() {
                    $('#divLoading').show();
                    $.post("../BO/ElimnarActividad.php", {id: id},
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
                                if (oTabla != null) {
                                     oTabla.fnReloadAjax();
                                }
                            }
                            else // Error
                            {
                                bootbox.dialog({
                                    message: msj,
                                    title: null,
                                    buttons: {
                                        Si: {
                                            label: "Cerrar",
                                              className: "btn-success",
                                              callback: function() {
                                            }
                                        }
                                    }
                                });
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
    
    function editarActividad(id) {
        // obtener el  registro
        var registros = oTabla.fnGetData();
        var registro = null;
        // itero
        for (var index in registros) {
            var row = registros[index];
            var id_actividad = row[0];
            if (id == id_actividad) {
                registro = row;
                break;
            }
        }
        // tengo el dato en registro
        $("#hdnIdActividad").val(registro[0]);
        $("#txtIdTipoActividad").val(registro[1]);
        $("#txtNombreActividad").val(registro[2]);
        $("#txtResumenActividad").val(registro[4]);
        $("#txtDescripcionActividad").val(registro[5]);
        $("#txtImgResumenActividad").val(registro[6]);
        $("#txtImgResumenChicaActividad").val(registro[7]);
        $("#txtURLActividad").val(registro[8]);
        // cambiar por el setear active 
        var activo = registro[9];
        $("#txtActivaActividad").val(activo);
        $('.btn[data-radio-name="txtActivaActividad"]').removeClass('active');
        if (activo == "Activa") {
            $("#btnActivo").addClass('active');    
        } else {
            $("#btnInActivo").addClass('active');
        }
        $('#btnCrear').prop('disabled', true);
        $('#btnEnviar').prop('disabled', false);
    }
    
    function ValidaTexto(texto,longitud){

        if (texto.length > longitud || texto.length == 0) {
            return false;
        }
        return true;
    }
    
    function ValidarDatos() {
        var flag = true;   
        $('#FormPrincipal .help-block').hide();
        $('#FormPrincipal .input-group').removeClass('has-error'); 
        // txtNombreActividad obligatorio
        var txtNombreActividad = $("#txtNombreActividad").val();
        if(!ValidaTexto(txtNombreActividad, 100)){
            $("#txtNombreActividad").siblings('.help-block').show();
            $("#txtNombreActividad").parent('.input-group').addClass('has-error');
            flag = false;
        }
            
        // txtResumenActividad obligatorio
        var txtResumenActividad = $("#txtResumenActividad").val();
        if(!ValidaTexto(txtResumenActividad, 1000)){
            $("#txtResumenActividad").siblings('.help-block').show();
            $("#txtResumenActividad").parent('.input-group').addClass('has-error');
            flag = false;
        }
        
        // txtIdTipoActividad obligatorio
        var txtIdTipoActividad = $("#txtIdTipoActividad").val();
        if (txtIdTipoActividad == "0") {
            $("#txtIdTipoActividad").siblings('.help-block').show();
            $("#txtIdTipoActividad").parent('.input-group').addClass('has-error');
            flag = false;
        }
        
        // txtDescripcionActividad
        
        // txtImgResumenActividad obligatorio
        var txtImgResumenActividad = $("#txtImgResumenActividad").val();
        if (txtImgResumenActividad == "") {
            $("#txtImgResumenActividad").siblings('.help-block').show();
            $("#txtImgResumenActividad").parent('.input-group').addClass('has-error');
            flag = false;
        }
        
        // txtImgResumenChicaActividad obligatorio si es Actividad
        var txtImgResumenChicaActividad = $("#txtImgResumenChicaActividad").val();
        if (txtImgResumenChicaActividad == "" && txtIdTipoActividad == "1") {
            $("#txtImgResumenChicaActividad").siblings('.help-block').show();
            $("#txtImgResumenChicaActividad").parent('.input-group').addClass('has-error');
            flag = false;
        }
        
        // txtURLActividad obligatorio si es publicidad Externa
        var txtURLActividad = $("#txtURLActividad").val();
        if (txtURLActividad == "" && txtIdTipoActividad == "3") {
            $("#txtURLActividad").siblings('.help-block').show();
            $("#txtURLActividad").parent('.input-group').addClass('has-error');
            flag = false;
        }
        return flag;
    }

</script>

</head>
<body>
    
<?php include 'menu.php'; ?>

	<!-- menu -->
	<div class="row">
		<div class="col-xs-12">
		<form class="form-horizontal" name="FormPrincipal" id="FormPrincipal" action="#">
		  	<div class="form-group">
		  		<h3></h3>
	  		</div>
	  		<div class="form-group">
		  		<h3><strong>Datos Actividad</strong></h3>
	  		</div>
		    <div class="form-group">
				<div class="input-group">
					<!-- NOMBRE_ACTIVIDAD -->
				  <span class="input-group-addon glyphicon glyphicon-user"></span>
				  <input type="text" class="form-control" id="txtNombreActividad" name="txtNombreActividad" placeholder="Nombre"/>
				  <span class="help-block" style="display: none;"> Ingresar nombre de la actividad</span>
				</div>
				
				<div class="input-group">
					<!-- RESUMEN -->
				  <span class="input-group-addon glyphicon glyphicon-pencil"></span>
				  <input type="text" class="form-control" id="txtResumenActividad" name="txtResumenActividad" placeholder="Resumen"/>
				  <span class="help-block" style="display: none;">Ingresar resumen de la actividad</span>
				</div>

				<div class="input-group">
					<!-- ID_TIPO_ACTIVIDAD -->
					<span class="input-group-addon glyphicon glyphicon-sort-by-attributes"></span>
					<select class="form-control" id="txtIdTipoActividad" name="txtIdTipoActividad">
					  <option value="0">Seleccione tipo de actividad ...</option>
					  <option value="1">Actividad</option>
					  <option value="2">Publicidad Interna</option>
					  <option value="3">Publicidad Externa</option>
					</select>
					<span class="help-block" style="display: none;">Seleccionar tipo de la actividad</span>
				</div>
				
				<div class="input-group">
					<!-- DESCRIPCION -->
					<span class="input-group-addon glyphicon glyphicon-tag"></span>
		            <textarea rows="6" class="form-control" id="txtDescripcionActividad" name="txtDescripcionActividad" placeholder="Descripción"></textarea>
				</div>
            </div>
            <div class="form-group">
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
				  <input type="text" class="form-control" id="txtURLActividad" name="txtURLActividad" placeholder="URL Publicidad Externa"/>
				  <span class="help-block" style="display: none;">Ingresar URL de la Publicidad Externa</span>
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<!-- ACTIVA -->
					<span class="input-group-addon glyphicon glyphicon-check"></span>
				    <input name="txtActivaActividad" id="txtActivaActividad" type='hidden' value="Activa"/>
	                <div class="btn-group" data-toggle="buttons">
	                  <button type="button" class="btn btn-default active" data-radio-name="txtActivaActividad" id="btnActivo" >Activa</button>
	                  <button type="button" class="btn btn-default" data-radio-name="txtActivaActividad" id="btnInActivo">Inactiva</button>
				    </div>
				</div>
	        </div>
		    <div class="form-group">
		    	<div class="btn-group btn-group-lg">
		    	  <button type="button" class="btn btn-success" id="btnCrear"><span class="glyphicon glyphicon-plus"></span> Crear</button>
				  <button type="submit" class="btn btn-success" id="btnEnviar"><span class="glyphicon glyphicon-floppy-saved"></span> Guardar</button>
				  <button type="button" class="btn btn-success" id="btnlimpiar"><span class="glyphicon glyphicon-floppy-remove"></span> Limpiar</button>
				</div>
		    </div>
		    <div class="hidden">
		    	<!-- ID_ACTIVIDAD -->
		    	<input type="text" class="form-control" id="hdnIdActividad" name="hdnIdActividad" placeholder=""/>
		    </div>
		</form>
		</div>
	</div>
	<!-- campo -->
	<hr>
	<!-- tabla -->
	<div class="row">
		<div class="col-xs-12">
			<table id="tblResultados" class="table table-striped table-bordered ">
                <thead>
                    <tr>
                        <th>ID_ACTIVIDAD</th>
                        <th>ID_TIPO_ACTIVIDAD</th>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>RESUMEN</th>
                        <th>DESCRIPCION</th>
                        <th>IMAGEN_RESUMEN</th>
                        <th>IMAGEN_RESUMEN_CHICA</th>
                        <th>URL_WEB</th>
                        <th style="max-width: 20px;">Estado</th>
                        <th style="max-width: 50px;">Acción</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
		</div>
	</div>

	<hr>
	<div>
	    
<?php include '../footer.php'; ?>

