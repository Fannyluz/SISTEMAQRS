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
      $sql=modeloPrincipal::conectar()->prepare("INSERT INTO personaluptvirtual(
      CodRolPersonal,DNI,Nombres,Apellidos,Foto,CorreoElectronico,Celular,Direccion,Fecha,Estado) 
      VALUES(:CodRolPersonal,:DNI,:Nombres,:Apellidos,:Foto,:CorreoElectronico,:Celular,:Direccion,:Fecha,:Estado)");
      
      $sql->bindParam(":CodRolPersonal",$datos['CodRolPersonal']);
      $sql->bindParam(":DNI",$datos['DNI']);
      $sql->bindParam(":Nombres",$datos['Nombres']);
      $sql->bindParam(":Apellidos",$datos['Apellidos']);
      $sql->bindParam(":Foto",$datos['Foto']);
      $sql->bindParam(":CorreoElectronico",$datos['CorreoElectronico']);
      $sql->bindParam(":Celular",$datos['Celular']);
      $sql->bindParam(":Direccion",$datos['Direccion']);
      $sql->bindParam(":Fecha",$datos['Fecha']);
      $sql->bindParam(":Estado",$datos['Estado']);
      $sql->execute();
      return $sql;
    }
 }