<?php

require_once "modeloPrincipal.php";

class TipoPersonalModelo extends modeloPrincipal{
 /*----- Modelo agregar tipo personal -----*/
    protected static function agregar_tipopersonal_modelo($datos){
      $sql=modeloPrincipal::conectar()->prepare("INSERT INTO personaluptvirtual(CodPersonalUptVirtual,
      CodTipoPersonal,DNI,Nombres,Apellidos,Foto,CorreoElectronico,Celular,Direccion,Fecha,Estado) 
      VALUES(:CodPersonalUptVirtual,:CodTipoPersonal,:DNI,:Nombres,:Apellidos,:Foto,:CorreoElectronico,:Celular,:Direccion,:Fecha,:Estado)");
      $sql->bindParam(":CodPersonalUptVirtual",$datos['CodPersonalUptVirtual']);
      $sql->bindParam(":CodTipoPersonal",$datos['CodTipoPersonal']);
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