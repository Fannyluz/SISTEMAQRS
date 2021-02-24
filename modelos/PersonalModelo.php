<?php

require_once "modeloPrincipal.php";

class PersonalModelo extends modeloPrincipal{
 /*----- inicio obtener datos -----*/
public function get_rolpersonal($CodRolPersonal){
  parent::set_names();
  $sql="SELECT * FROM rolpersonal WHERE CodRolPersonal=? AND Estado=1";
  $sql=bindvalue(1, $CodRolPersonal);
  $sql->execute();
  return $resultado=$sql->fetchAll();
}
 /*----- fin obtener datos -----*/
  /*----- Modelo agregar tipo personal -----*/ 
 protected static function agregar_personal_modelo($datos){
      $sql=modeloPrincipal::conectar()->prepare("INSERT INTO oevpeutpersonaluptvirtual(
      ROPcodigo,PEUDNI,PEUnombres,ApePEUapellidosllidos,PEUfoto,PEUcorreoElectronico,PEUcelular,PEUdireccion,PEUfecha,PEUestado) 
      VALUES(:ROPcodigo,:PEUDNI,:PEUnombres,:PEUapellidos,:PEUfoto,:PEUcorreoElectronico,:PEUcelular,:PEUdireccion,:PEUfecha,:PEUestado)");
      
      $sql->bindParam(":ROPcodigo",$datos['ROPcodigo']);
      $sql->bindParam(":PEUDNI",$datos['PEUDNI']);
      $sql->bindParam(":PEUnombres",$datos['PEUnombres']);
      $sql->bindParam(":PEUapellidos",$datos['PEUapellidos']);
      $sql->bindParam(":PEUfoto",$datos['PEUfoto']);
      $sql->bindParam(":PEUcorreoElectronico",$datos['PEUcorreoElectronico']);
      $sql->bindParam(":PEUcelular",$datos['PEUcelular']);
      $sql->bindParam(":PEUdireccion",$datos['PEUdireccion']);
      $sql->bindParam(":PEUfecha",$datos['PEUfecha']);
      $sql->bindParam(":PEUestado",$datos['PEUestado']);
      $sql->execute();
      return $sql;
    }
    public function listar_personal_modelo(){
        $consulta="SELECT * FROM oevpeutpersonaluptvirtual";
        $conexion=modeloPrincipal::conectar();
        $datos=$conexion->query($consulta);
        $datos=$datos->fetchAll();
        return $datos;
        
    }
 }