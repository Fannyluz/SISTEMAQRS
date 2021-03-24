<?php

require_once "modeloPrincipal.php";

class RolModelo extends modeloPrincipal{
 /*----- Modelo agregar casos */
    protected static function agregar_rol_modelo($datos){
      $sql=modeloPrincipal::conectar()->prepare("INSERT INTO oevroptrolpersonal(ROPnombre,ROPdescripcion,ROPfecha,ROPestado) 
      VALUES(:ROPnombre,:ROPdescripcion,:ROPfecha,:ROPestado)");
      
      $sql->bindParam(":ROPnombre",$datos['ROPnombre']);
      $sql->bindParam(":ROPdescripcion",$datos['ROPdescripcion']);
      $sql->bindParam(":ROPfecha",$datos['ROPfecha']);
      $sql->bindParam(":ROPestado",$datos['ROPestado']);
      $sql->execute();
      return $sql;
    }
    public function listar_rol_modelo(){
        $consulta="SELECT * FROM oevroptrolpersonal";
        $conexion=modeloPrincipal::conectar();
        $datos=$conexion->query($consulta);
        $datos=$datos->fetchAll();
        return $datos;
        
    }


    //datos del caso
   protected static function Ver_Rol_Modelo($codigo)
   {
 
     $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM oevroptrolpersonal WHERE  ROPcodigo=:ROPcodigo");
     $sql->bindParam(":ROPcodigo",$codigo);
     $sql->execute();
     return $sql;
   }
 }