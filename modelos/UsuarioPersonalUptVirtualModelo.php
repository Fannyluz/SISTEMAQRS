<?php

require_once "modeloPrincipal.php";

class UsuarioPersonalUptVirtualModelo extends modeloPrincipal{
    
 /*----- Modelo agregar casos */

    protected static function agregar_usuariopersonaluptvirtual_modelo($datos){
      $sql=modeloPrincipal::conectar()->prepare("INSERT INTO usuariopersonaluptvirtual(CodPersonalUptVirtual,Usuario,Clave,Privilegio,Fecha,Estado) 
      VALUES(:CodPersonalUptVirtual,:Usuario,:Clave,:Privilegio,:Fecha,:Estado)");
      $sql->bindParam(":CodPersonalUptVirtual",$datos['CodPersonalUptVirtual']);
      $sql->bindParam(":Usuario",$datos['Usuario']);
      $sql->bindParam(":Clave",$datos['Clave']);
      $sql->bindParam(":Privilegio",$datos['Privilegio']);
      $sql->bindParam(":Fecha",$datos['Fecha']);
      $sql->bindParam(":Estado",$datos['Estado']);
      $sql->execute();
      return $sql;
    }
    public function listar_usuariopersonaluptvirtual_modelo(){
      $consulta="SELECT * FROM usuariopersonaluptvirtual";
      $conexion=modeloPrincipal::conectar();
      $datos=$conexion->query($consulta);
      $datos=$datos->fetchAll();
      return $datos;
      
  }


 }