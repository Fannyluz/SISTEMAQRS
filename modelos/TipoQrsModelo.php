<?php

require_once "modeloPrincipal.php";

class TipoQrsModelo extends modeloPrincipal{
 /*----- Modelo agregar casos */
    protected static function agregar_tipoqrs_modelo($datos){
      $sql=modeloPrincipal::conectar()->prepare("INSERT INTO oevtipttipoqrs(TIPnombre,TIPdescripcion,TIPfecha,TIPestado) 
      VALUES(:TIPnombre,:TIPdescripcion,:TIPfecha,:TIPestado)");
      $sql->bindParam(":TIPnombre",$datos['TIPnombre']);
      $sql->bindParam(":TIPdescripcion",$datos['TIPdescripcion']);
      $sql->bindParam(":TIPfecha",$datos['TIPfecha']);
      $sql->bindParam(":TIPestado",$datos['TIPestado']);
      $sql->execute();
      return $sql;
    }
    public function listar_tipoqrs_modelo(){
      $consulta="SELECT * FROM oevtipttipoqrs ORDER BY TIPfecha DESC";
      $conexion=modeloPrincipal::conectar();
      $datos=$conexion->query($consulta);
      $datos=$datos->fetchAll();
      return $datos;
      
  }
  protected static function eliminar_tipoqrs_modelo($codigo)
  {
    $sql=modeloPrincipal::conectar()->prepare("DELETE FROM oevtipttipoqrs WHERE  TIPcodigo =:TIPcodigo");
    $sql->bindParam(":TIPcodigo",$codigo);
    $sql->execute();
    return $sql;
  }
//datos tipo qrs
   protected static function Ver_tipoqrs_Modelo($codigo)
  {

    $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM oevtipttipoqrs WHERE  TIPcodigo=:TIPcodigo");
    $sql->bindParam(":TIPcodigo",$codigo);
    $sql->execute();
    return $sql;
  }

  //editar caso
   protected static function Editar_tipoqrs_Modelo($datos)
  {

    $sql=modeloPrincipal::conectar()->prepare("UPDATE oevtipttipoqrs SET TIPnombre=:TIPnombre,TIPdescripcion=:TIPdescripcion,TIPfecha=:TIPfecha,TIPestado=:TIPestado WHERE TIPcodigo=:CODIGO");

   $sql->bindParam(":TIPnombre",$datos['TIPnombre']);
   $sql->bindParam(":TIPdescripcion",$datos['TIPdescripcion']);
   $sql->bindParam(":TIPfecha",$datos['TIPfecha']);
   $sql->bindParam(":TIPestado",$datos['TIPestado']);
   $sql->bindParam(":CODIGO",$datos['CODIGO']);
   $sql->execute();
    return $sql;
  }


}