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
      function init_map() {
      	// @-39.286284,-72.1744913,10z
      	// 45.430817,12.331516
        var var_location = new google.maps.LatLng(45.430817,12.331516);
        var var_mapoptions = {
          center: var_location,
          zoom: 14
        };
        var var_marker = new google.maps.Marker({
            position: var_location,
            map: var_map,
            title:"<?php echo $V_TITULO; ?>"});
        var var_map = new google.maps.Map(document.getElementById("map-container"),
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