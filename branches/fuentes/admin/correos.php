<?php include 'head.php'; ?>

<script type="text/javascript">
    var oTabla = null;

    $(function() {
        $("li.active").removeClass('active');
        $("li > a:contains('Correos')").parent().addClass('active');
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
            "sAjaxSource" : '../BO/BuscaCorreos.php', // fuente del json
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
        
        oTabla.fnSetColumnVis(0, false ); // id
    });
    
    function irA(dir) {
        
        window.location.replace(dir);
    }
</script>

</head>
<body>
    
<?php include 'menu.php'; ?>
<div class="row">
    <div class="col-xs-12">
        <div class="form-group">
            <h3></h3>
        </div>      
    </div>
    <div class="col-xs-12">
        <form class="form-horizontal" name="FormPrincipal" id="FormPrincipal" action="#">
            <div class="form-group">
                <h3></h3>
                <h3></h3>
            </div>
        </form>
    </div>
</div>
<!-- tabla -->
<div class="row">
    <div class="col-xs-12">
        <table id="tblResultados" class="table table-striped table-bordered ">
            <thead>
                <tr>
                    <th>ID_CLIENTE</th>
                    <th style="max-width: 20%;">Nombre</th>
                    <th style="max-width: 20%;">E-Mail</th>
                    <th style="max-width: 10%;">Telefono</th>
                    <th style="max-width: 10%;">Asunto</th>
                    <th style="max-width: 30%;">Comentario</th>
                    <th style="max-width: 10%;">Fecha</th>
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