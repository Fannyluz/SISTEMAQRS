<?php

require_once "modeloPrincipal.php";
class personalmodel extends modeloPrincipal{

    public function listar_personal_modelo(){
        $consulta="SELECT * FROM personaluptvirtual";
        $conexion=modeloPrincipal::conectar();
        $datos=$conexion->query($consulta);
        $datos=$datos->fetchAll();
        return $datos;
        
    }
}
