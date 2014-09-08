<?php include 'head.php'; ?>

<script type="text/javascript">
    var oTabla = null;

    $(function() {
        // comenzar con el boton crear habilitado
        $('#btnEnviar').prop('disabled', true);
        // comenzar con el boton guardar deshabilitado
        $("li.active").removeClass('active');
        $("li > a:contains('Imagenes')").parent().addClass('active');
        $('#divLoading').hide();

        $("body").on({
            ajaxStart: function() { 
                $('#divLoading').show();
            },
            ajaxStop: function() { 
                $('#divLoading').hide();
            }    
        });
        
        oTabla = $('#tblResultados').dataTable({
            bJQueryUI : true,
            sPaginationType : "full_numbers", //tipo de paginacion
            "bFilter" : false, // muestra el cuadro de busqueda
            "iDisplayLength" : 10, // cantidad de filas que muestra
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
            "sAjaxSource" : '../BO/BuscaImagen.php', // fuente del json
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
            $("#hdnIdImagen").val("");
            crearImagen();
        });
        
        $("#btnEnviar").click(function(){
            // habilitarlo solo si se selecciono un elemento de la tabla
            crearImagen();
            event.preventDefault();
        });
        
        oTabla.fnSetColumnVis(1, false );
        oTabla.fnSetColumnVis(3, false );
    });
    
    function crearImagen() {
        if(ValidarDatos()) {
            var mensaje = "Seguro que desea crear la Imagen?";   
            if ($("#hdnIdImagen").val() != "") {
                mensaje = "Seguro que desea guardar la Imagen?";
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
                        $.post("../BO/CrearImagen.php", $('#FormPrincipal').serialize(),
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

        $("#txtUrlImagen").val("");
        $("#txtIdActividad").val('0');

        $("#txtPrincipalImagen").prop('checked', false);
        
        $("#hdnIdImagen").val("");

        // deshabilitar el guardar
        $('#btnEnviar').prop('disabled', true);
        $('#btnCrear').prop('disabled', false);
        
        $('#FormPrincipal .help-block').hide();
        $('#FormPrincipal .input-group').removeClass('has-error');
    }
    
    function irA(dir) {
        
        window.location.replace(dir);
    }
    
    function eliminarImagen(id) {
        bootbox.dialog({
          message: "Seguro que desea eliminar la Imagen?",
          title: null,
          buttons: {
            Si: {
              label: "Si",
              className: "btn-success",
              callback: function() {
                    $('#divLoading').show();
                    $.post("../BO/ElimnarImagen.php", {id: id},
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
    
    function editarImagen(id) {
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
        $("#hdnIdImagen").val(registro[0]);
        $("#txtIdActividad").val(registro[1]);
        $("#txtUrlImagen").val(registro[2]);
        // cambiar por el setear active 
        var activo = registro[3];
        if (activo == "1") {
            $("#txtPrincipalImagen").prop('checked', true);    
        } else {
            $("#txtPrincipalImagen").prop('checked', false);   
        }
        $('#btnCrear').prop('disabled', true);
        $('#btnEnviar').prop('disabled', false);
    }
    
    function ValidaTexto(texto,longitud){

        if (texto.length > longitud || longitud.length == 0) {
            return false;
        }
        return true;
    }
    
    function ValidarDatos() {
        var flag = true;   
        $('#FormPrincipal .help-block').hide();
        $('#FormPrincipal .input-group').removeClass('has-error'); 

        var txtIdActividad = $("#txtIdActividad").val();
        if (txtIdActividad == "0") {
            $("#txtIdActividad").siblings('.help-block').show();
            $("#txtIdActividad").parent('.input-group').addClass('has-error');
            flag = false;
        }

        var txtUrlImagen = $("#txtUrlImagen").val();
        if (txtUrlImagen == "") {
            $("#txtUrlImagen").siblings('.help-block').show();
            $("#txtUrlImagen").parent('.input-group').addClass('has-error');
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
                <h3><strong>Datos Imagen</strong></h3>
            </div>
            <div class="form-group">

                <div class="input-group">
                    <!-- ID_ACTIVIDAD -->
                    <span class="input-group-addon glyphicon glyphicon-sort-by-attributes"></span>
                    <select class="form-control" id="txtIdActividad" name="txtIdActividad">
                      <option value="0">Seleccione Actividad ...</option>
                      <?php // obtengo las Actividades y las publicidades internas
                      $obj = new Utilidades($V_HOST,$V_USER,$V_PASS,$V_BBDD);
                      $actividades = $obj->ObtenerActividadesInternas();

                      foreach ($actividades as $actividad) {
                          echo "<option value=\"".$actividad['ID_ACTIVIDAD']."\">".$actividad['NOMBRE_ACTIVIDAD']."</option>";
                      }                    
                      ?>
                    </select>
                    <span class="help-block" style="display: none;">Seleccionar Actividad</span>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <!-- URL_IMAGEN -->
                  <span class="input-group-addon glyphicon glyphicon-picture"></span>
                  <input type="text" class="form-control" id="txtUrlImagen" name="txtUrlImagen" placeholder="URL Imagen"/>
                  <span class="help-block" style="display: none;">Ingresar URL Imagen</span>
                </div>
                <div class="input-group">
                <div class="checkbox">
                    <label>
                      <input type="checkbox" id="txtPrincipalImagen" name="txtPrincipalImagen"> Principal
                    </label>
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
                <!-- ID_IMAGEN -->
                <input type="text" class="form-control" id="hdnIdImagen" name="hdnIdImagen" placeholder=""/>
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
                        <th style="max-width: 15px;">Id</th>
                        <th>ID_ACTIVIDAD</th>
                        <th>Url</th>
                        <th>ES_PRINCIPAL</th>
                        <th>Nom. Actividad</th>
                        <th style="max-width: 50px;">Nom. Tipo Act.</th>                       
                        <th style="max-width: 70px;;">Acción</th>
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

