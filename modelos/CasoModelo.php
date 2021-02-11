<?php

require_once "modeloPrincipal.php";

class CasoModelo extends modeloPrincipal{
 /*----- Modelo agregar casos */
    protected static function agregar_caso_modelo($datos){
      $sql=modeloPrincipal::conectar()->prepare("INSERT INTO caso(Nombre,Descripcion) 
      VALUES(:Nombre,:Descripcion)");
      $sql->bindParam(":Nombre",$datos['Nombre']);
      $sql->bindParam(":Descripcion",$datos['Descripcion']);
      $sql->execute();
      return $sql;
    }
 }