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
      $consulta="SELECT * FROM oevtiuttipousuario ORDER BY TIUfecha DESC";
      $conexion=modeloPrincipal::conectar();
      $datos=$conexion->query($consulta);
      $datos=$datos->fetchAll();
      return $datos;
      
  }

 public function listar_tipousuario_estado_modelo(){
      $consulta="SELECT * FROM oevtiuttipousuario WHERE TIUestado=1";
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

  //ver datos tipo usuario
   protected static function Ver_tipousuario_Modelo($codigo)
  {

    $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM oevtiuttipousuario WHERE  TIUcodigo=:TIUcodigo");
    $sql->bindParam(":TIUcodigo",$codigo);
    $sql->execute();
    return $sql;
  }
//editar tipo usuario - emisor
   protected static function Editar_tipousuario_Modelo($datos)
  {

    $sql=modeloPrincipal::conectar()->prepare("UPDATE oevtiuttipousuario SET TIUnombre=:TIUnombre,TIUdescripcion=:TIUdescripcion,TIUfecha=:TIUfecha,TIUestado=:TIUestado WHERE TIUcodigo=:CODIGO");

   $sql->bindParam(":TIUnombre",$datos['TIUnombre']);
   $sql->bindParam(":TIUdescripcion",$datos['TIUdescripcion']);
   $sql->bindParam(":TIUfecha",$datos['TIUfecha']);
   $sql->bindParam(":TIUestado",$datos['TIUestado']);
   $sql->bindParam(":CODIGO",$datos['CODIGO']);
   $sql->execute();
    return $sql;
  }


 }