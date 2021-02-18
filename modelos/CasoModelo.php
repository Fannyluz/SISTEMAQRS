<?php

require_once "modeloPrincipal.php";

class CasoModelo extends modeloPrincipal{
    
 /*----- Modelo agregar casos */

    protected static function agregar_caso_modelo($datos){
      $sql=modeloPrincipal::conectar()->prepare("INSERT INTO caso(Nombre,Descripcion,Fecha,Estado) 
      VALUES(:Nombre,:Descripcion,:Fecha,:Estado)");
      $sql->bindParam(":Nombre",$datos['Nombre']);
      $sql->bindParam(":Descripcion",$datos['Descripcion']);
      $sql->bindParam(":Fecha",$datos['Fecha']);
      $sql->bindParam(":Estado",$datos['Estado']);
      $sql->execute();
      return $sql;
    }
    public function listar_casos_modelo(){
      $consulta="SELECT * FROM caso";
      $conexion=modeloPrincipal::conectar();
      $datos=$conexion->query($consulta);
      $datos=$datos->fetchAll();
      return $datos;
      
  }

 }