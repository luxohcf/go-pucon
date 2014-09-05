<?php

@session_start();
// si ya ha iniciado sesiòn mostrar mantenedores
if(isset($_SESSION['usuario']) == TRUE)
{
    header("Location: main.php");
    exit();
}
// si no ha iniciado sesiòn mostrar el login
require_once '../config/parametros.php';
?>

<!DOCTYPE html>   
<html lang="en">   
<head>   
    <meta charset="utf-8">   
    <title><?php echo $V_TITULO; ?> </title>     
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <!-- jQuery Version 1.11.0 -->
    <script src="../js/jquery-1.11.0.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
	<!-- Dialogos -->
	<script src="../js/bootbox.min.js" type="text/javascript"></script>
    <script type="text/javascript">

    $(function() {
        
        $('#divError').hide();
        
        // Inicio de sesión
        $('#formIniciosSesion').submit(function(event){
            event.preventDefault();
            var vname = $('#txtUser').val();
            var vpass = $('#txtPass').val();
            if(validaInicioSesion(vname, vpass))
            {
                $.post("login.php", { name: vname, pass: vpass },
                   function(data) {
                    
                    var obj = jQuery.parseJSON(data);
                    
                    if(obj.error == true)
                    {
                        Limpiar();
                        $('#divError').html( obj.html );
                        $('#divError').show();
                    }
                    else
                    {
                        window.location.href = "main.php";
                    }
                });
            }
            else
            {
                Limpiar();
                $('#divError').show();
            }
         });
         
         function Limpiar(){
            $('#txtUser').val("");
            $('#txtPass').val("");
         }
         
         function validaInicioSesion(nombre, pass){

            if(!/^[a-zA-Z0-9\.]{4,20}$/.test(pass)){
                return false;
            }
            return true;
         }
         
         $(".texto").bind('keypress', function(event){
            var regex = new RegExp("^([a-zA-Z0-9\.\-]+)$");
            var key = String.fromCharCode(!event.charCode ? event.wich : event.charCode);
            if(!regex.test(key)){
                event.preventDefault();
                return false;
            }
        });

        $('#txtUser').keypress(function(e) {
            if (e.which == '13') {
                $("#txtPass").focus();
            }
        });
        
        $('#txtPass').keypress(function(e) {
            if (e.which == '13') {
                $('#formIniciosSesion').submit();
            }
        });

     });
    </script>
</head>  
<body>
	<style type="text/css">
		#formIniciosSesion input, #formIniciosSesion h2, #formIniciosSesion button {
			max-width: 500px;
		}
	</style>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 text-center" >
				<img src="../<?php echo $V_LOGO_GRANDE; ?>" alt="" id="logo">
			</div>
		</div>
		<div class="row row-centered">
			<div class="col-sm-4 hidden-xs"></div>
			<div class="col-sm-4 col-xs-12 text-center">
				<form id="formIniciosSesion">
					<h2 class="form-signin-heading">Inicio de sesión</h2>
					 <br>
	                <div class="alert alert-danger"  id="divError" >
	                  - Debe ingresar un RUT y/o Contraseña válida.
	                </div>
	                <input id="txtUser" type="text" class="form-control texto" placeholder="Usuario" autofocus> 
	                <br>
	                <input id="txtPass" type="password" class="form-control texto" placeholder="Contraseña">
	                <br>
	                <br>
	                <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
                </form>
			</div>
			<div class="col-sm-4 hidden-xs"></div>
		</div>
	</div>
</body>
</html> 