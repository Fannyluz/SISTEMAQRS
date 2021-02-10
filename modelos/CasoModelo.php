<?php

require_once "ModeloPrincipal.php";

class CasoModelo extends ModeloPrincipal{
 /*----- Modelo agregar casos */
    protected static function agregar_caso_modelo($datos){
      $sql= ModeloPrincipal::conectar()->prepare("INSERT INTO tbl_caso
      (Nombre,descripcion) VALUES
      (:Nombre,:Descripcion)");

      $sql->bindParam(":Nombre",$datos['Nombre']);
      $sql->bindParam(":Descripcion",$datos['Descripcion']);
      $sql->execute();
       return $sql;

    }
 }