<?php

require_once "modeloPrincipal.php";

class TipoUsuarioModelo extends modeloPrincipal{
 /*----- Modelo agregar casos */
    protected static function agregar_tipousuario_modelo($datos){
      $sql=modeloPrincipal::conectar()->prepare("INSERT INTO tipousuario(Nombre,Descripcion,Fecha,Estado) 
      VALUES(:Nombre,:Descripcion,:Fecha,:Estado)");
      $sql->bindParam(":Nombre",$datos['Nombre']);
      $sql->bindParam(":Descripcion",$datos['Descripcion']);
      $sql->bindParam(":Fecha",$datos['Fecha']);
      $sql->bindParam(":Estado",$datos['Estado']);
      $sql->execute();
      return $sql;
    }
 }