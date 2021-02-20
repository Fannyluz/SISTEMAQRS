<?php

require_once "modeloPrincipal.php";

class TipoQrsModelo extends modeloPrincipal{
 /*----- Modelo agregar casos */
    protected static function agregar_tipoqrs_modelo($datos){
      $sql=modeloPrincipal::conectar()->prepare("INSERT INTO tipoqrs(Nombre,Descripcion,Fecha,Estado) 
      VALUES(:Nombre,:Descripcion,:Fecha,:Estado)");
      $sql->bindParam(":Nombre",$datos['Nombre']);
      $sql->bindParam(":Descripcion",$datos['Descripcion']);
      $sql->bindParam(":Fecha",$datos['Fecha']);
      $sql->bindParam(":Estado",$datos['Estado']);
      $sql->execute();
      return $sql;
    }
    public function listar_tipoqrs_modelo(){
      $consulta="SELECT * FROM tipoqrs";
      $conexion=modeloPrincipal::conectar();
      $datos=$conexion->query($consulta);
      $datos=$datos->fetchAll();
      return $datos;
      
  }
  protected static function eliminar_tipoqrs_modelo($codigo)
  {
    $sql=modeloPrincipal::conectar()->prepare("DELETE FROM tipoqrs WHERE  CodTipoQRS=:CodTipoQRS");
    $sql->bindParam(":CodTipoQRS",$codigo);
    $sql->execute();
    return $sql;
  }

}