<?php

require_once "modeloPrincipal.php";

class TipoUsuarioModelo extends modeloPrincipal{
 /*----- Modelo agregar casos */
    protected static function agregar_tipousuario_modelo($datos){
      $sql=modeloPrincipal::conectar()->prepare("INSERT INTO oevtiuttipousuario(TIUnombre,TIUdescripcion,TIUfecha,TIUestado) 
      VALUES(:TIUnombre,:TIUdescripcion,:TIUfecha,:TIUestado)");
      $sql->bindParam(":TIUnombre",$datos['TIUnombre']);
      $sql->bindParam(":TIUdescripcion",$datos['TIUdescripcion']);
      $sql->bindParam(":TIUfecha",$datos['TIUfecha']);
      $sql->bindParam(":TIUestado",$datos['TIUestado']);
      $sql->execute();
      return $sql;
    }
    public function listar_tipousuario_modelo(){
      $consulta="SELECT * FROM oevtiuttipousuario";
      $conexion=modeloPrincipal::conectar();
      $datos=$conexion->query($consulta);
      $datos=$datos->fetchAll();
      return $datos;
      
  }
  protected static function eliminar_tipousuario_modelo($codigo)
  {
    $sql=modeloPrincipal::conectar()->prepare("DELETE FROM oevtiuttipousuario WHERE  TIUcodigo=:TIUcodigo");
    $sql->bindParam(":TIUcodigo",$codigo);
    $sql->execute();
    return $sql;
  }

 }