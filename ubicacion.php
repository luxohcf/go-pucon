<?php
include 'header.php';
?>
<hr>
<!-- Mapa de google -->
<div class="row">
	<!-- Estilos especificos -->
	<style>
		html { height: 100% }
		body { height: 100% }
		#map-container { height: 80% }
		#map-outer {  height: 600px; 
                      padding: 20px; 
                      border: 2px solid #CCC; 
                      margin-bottom: 20px; 
                      background-color:#FFF }
      	#map-container { height: 100% }

	</style>
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script>
	   var var_map = null;
	   var infoWindow = null; 
	   function addInfoWindow(marker, message) {
            var info = message;

            infoWindow = new google.maps.InfoWindow({
                content: message
            });

            google.maps.event.addListener(marker, 'click', function () {
                infoWindow.open(var_map, marker);
            });
        }
      function init_map() {
        var var_location = new google.maps.LatLng(<?php echo $V_CORDENADAS; ?>);
        var var_mapoptions = {
          center: var_location,
          zoom: 16,
          mapTypeId:google.maps.MapTypeId.HYBRID
        };
        var var_marker = new google.maps.Marker({
            position: var_location,
            map: var_map,
            title:"<?php echo $V_TITULO; ?>"});
            
        addInfoWindow(var_marker, "<?php echo $V_DIRECCION; ?>");
        
        infoWindow.open(var_map, var_marker);
        
        var_map = new google.maps.Map(document.getElementById("map-container"),
            var_mapoptions);
        var_marker.setMap(var_map);    
      }
      google.maps.event.addDomListener(window, 'load', init_map);

    </script>
	<!-- Columna izquierda -->
	<div class="col-md-8">
		<div class="container-fluid">
			<div class="row">
		      <div id="map-outer" class="col-md-12">
		        <div id="map-container"></div>
		      </div>
		  </div> 
		</div>
	</div>

<?php
include 'publicidad.php';
?>	
	
</div>
				
<?php
include 'footer.php';
?>