<?php

require_once "ModeloPrincipal.php";

class CasoModelo extends ModeloPrincipal{
 /*----- Modelo agregar casos */
    protected static function agregar_caso_modelo($datos){
      $sql= ModeloPrincipal::conectar()->prepare("INSERT INTO 
      tbl_caso(tbl_caso_Nombre,tbl_caso_Estado,tbl_caso_Fecha) 
      VALUES(:Nombre,:Estado,:Fecha)");

      $sql->bindParam(":Nombre",$datos['Nombre']);
      $sql->bindParam(":Estado",$datos['Estado']);
      $sql->bindParam(":Fecha",$datos['Fecha']);
      $sql->execute();
       return $sql;

    }
 }