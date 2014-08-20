<?php


class Utilidades
{
    private $V_HOST;
    private $V_USER;
    private $V_PASS;
    private $V_BBDD;
    
    function __construct($V_HOST="localhost", $V_USER="go-pucon", $V_PASS="go-pucon", $V_BBDD="go-pucon")
    {
        $this->V_HOST=$V_HOST;
        $this->V_USER=$V_USER;
        $this->V_PASS=$V_PASS;
        $this->V_BBDD=$V_BBDD;
    }
    
    public function GeneraActividades(){
        $html  = "<div class=\"row\">";
        $mySqli = new mysqli($this->V_HOST, $this->V_USER, $this->V_PASS, $this->V_BBDD);
        $query = "SELECT NOMBRE_ACTIVIDAD, RESUMEN, IMAGEN_RESUMEN_CHICA, URL_WEB 
                  FROM TBL_ACTIVIDAD WHERE ACTIVA = 1 AND ID_TIPO_ACTIVIDAD = 1";

        if ($mySqli -> connect_errno) {
            $html = "Error al generar el contenido";
            return $html;
        }
        $res = $mySqli -> query($query);
        $cont = 0;

        if ($mySqli -> affected_rows > 0) {
            while ($row = $res -> fetch_assoc()) {
                $html .= "<div class=\"col-md-6\">";
                $html .= "<div class=\"thumbnail\" >";
                
                $html .= "<img src=\"".$row["IMAGEN_RESUMEN_CHICA"]."\" alt=''>";
                $html .= "<div class=\"caption\">";
                $html .= "<h3><p class=\"text-center\">".$row["NOMBRE_ACTIVIDAD"]."</p></h3><div class='hr'></div>";
                $html .= "<p>".$row["RESUMEN"]."</p>";
                $html .= "<p class=\"text-center\"><a href=\"".$row["URL_WEB"]."\" class=\"btn btn-default\"><strong>VER DETALLES</strong></a>";
                $html .= "</p></div></div></div>";

                $cont++;
                
                if ($cont % 2 == 0) {
                    $html .= "</div><div class=\"row\">";
                }
            }
        }
        
        $html .= "</div>";
        return $html;
    }

    public function GeneraGaleriaActividad($idActividad = "0") {
        $html  = "";
        $mySqli = new mysqli($this->V_HOST, $this->V_USER, $this->V_PASS, $this->V_BBDD);
        $query = "SELECT URL_IMAGEN, ES_PRINCIPAL 
                  FROM TBL_IMAGEN WHERE ID_ACTIVIDAD = $idActividad";

        if ($mySqli -> connect_errno) {
            $html = "Error al generar el contenido";
            return $html;
        }
        $res = $mySqli -> query($query);

        if ($mySqli -> affected_rows > 0) {
            while ($row = $res -> fetch_assoc()) {
                if ($row["ES_PRINCIPAL"] == "1") {
                    $html .= "<div class=\"item active\">";
                } else {
                    $html .= "<div class=\"item\">";
                }
                
                $html .= "<img src=\"".$row["URL_IMAGEN"]."\" alt=''>";
                $html .= "</div>";

             }
        } else {
            $html  = "<div class=\"item active\">
                      <img src=\"http://placehold.it/1200x300\" alt=''>
                      <div class=\"carousel-caption\">
                        ...
                      </div>
                    </div>";
        }

        return $html;
    }

    public function ObtenerActividades() {
        $mySqli = new mysqli($this->V_HOST, $this->V_USER, $this->V_PASS, $this->V_BBDD);
        $query = "SELECT ID_ACTIVIDAD, ID_TIPO_ACTIVIDAD, NOMBRE_ACTIVIDAD, RESUMEN, DESCRIPCION, 
                         IMAGEN_RESUMEN, IMAGEN_RESUMEN_CHICA, URL_WEB
                  FROM TBL_ACTIVIDAD WHERE ACTIVA = 1 AND ID_TIPO_ACTIVIDAD = 1";
        $actividades = array();

        if ($mySqli -> connect_errno) {

            return $actividades;
        }
        $res = $mySqli -> query($query);

        if ($mySqli -> affected_rows > 0) {
            while ($row = $res -> fetch_assoc()) {
                $actividades[] = $row;
            }
            return $actividades;
        } else {
            return $actividades;
        }
    }

    public function ObtenerActividad($idActividad = "0") {
        $mySqli = new mysqli($this->V_HOST, $this->V_USER, $this->V_PASS, $this->V_BBDD);
        $query = "SELECT ID_ACTIVIDAD, ID_TIPO_ACTIVIDAD, NOMBRE_ACTIVIDAD, RESUMEN, DESCRIPCION, 
                         IMAGEN_RESUMEN, IMAGEN_RESUMEN_CHICA, URL_WEB
                  FROM TBL_ACTIVIDAD WHERE ID_ACTIVIDAD = $idActividad AND ACTIVA = 1";

        if ($mySqli -> connect_errno) {
            return FALSE;
        }
        $res = $mySqli -> query($query);

        if ($mySqli -> affected_rows > 0) {
            while ($row = $res -> fetch_assoc()) {
                return $row;
            }
        } else {
            return FALSE;
        }
    }
    
    public function GeneraPublicidad() {
        $html  = "";
        $mySqli = new mysqli($this->V_HOST, $this->V_USER, $this->V_PASS, $this->V_BBDD);
        $query = "SELECT URL_WEB, IMAGEN_RESUMEN 
                  FROM TBL_ACTIVIDAD WHERE ID_TIPO_ACTIVIDAD = 2 OR ID_TIPO_ACTIVIDAD = 3";

        if ($mySqli -> connect_errno) {
            $html = "Error al generar el contenido";
            return $html;
        }
        $res = $mySqli -> query($query);

        if ($mySqli -> affected_rows > 0) {
            while ($row = $res -> fetch_assoc()) {
                $html .= "<div class=\"col-md-12\">";
                $html .= "<div class=\"text-center\" >";
                $html .= "<img src=\"".$row["IMAGEN_RESUMEN"]."\" alt='' onclick=\"irA('".$row["URL_WEB"]."');\">";
                $html .= "</div></div>";
                $html .= "<div class=\"col-md-12\">&nbsp;</div>";
            }
        }
        return $html;
    }
    
}

?>