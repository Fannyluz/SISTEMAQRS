<?php

require_once "modeloPrincipal.php";

class RolModelo extends modeloPrincipal{
 /*----- Modelo agregar casos */
    protected static function agregar_rol_modelo($datos){
      $sql=modeloPrincipal::conectar()->prepare("INSERT INTO rolpersonal(Nombre,Descripcion,Fecha,Estado) 
      VALUES(:Nombre,:Descripcion,:Fecha,:Estado)");
      
      $sql->bindParam(":Nombre",$datos['Nombre']);
      $sql->bindParam(":Descripcion",$datos['Descripcion']);
      $sql->bindParam(":Fecha",$datos['Fecha']);
      $sql->bindParam(":Estado",$datos['Estado']);
      $sql->execute();
      return $sql;
    }
    public function listar_rolpersonal_modelo(){
        $consulta="SELECT * FROM rolpersonal";
        $conexion=modeloPrincipal::conectar();
        $datos=$conexion->query($consulta);
        $datos=$datos->fetchAll();
        return $datos;
        
    }

 }