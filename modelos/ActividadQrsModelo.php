<?php

require_once "modeloPrincipal.php";

class ActividadQrsModelo extends modeloPrincipal{
    

    protected static function agregar_ActividadQrs_modelo($datos){
      $sql=modeloPrincipal::conectar()->prepare("INSERT INTO oevactpactividadqrs(TIPcodigo ,CAScodigo,TIUcodigo,UPUcodigo,ACTcodigoUPT,ACTnombres,ACTapellidos,ACTDescripcion,ACTcelular,ACTcorreoelectronico,ACTfecha,ACTestado) 
      VALUES(:TIPcodigo,:CAScodigo,:TIUcodigo,:UPUcodigo,:ACTcodigoUPT,:ACTnombres,:ACTapellidos,:ACTDescripcion,:ACTcelular,:ACTcorreoelectronico,:ACTfecha,:ACTestado)");
      $sql->bindParam(":TIPcodigo",$datos['TIPcodigo']);
      $sql->bindParam(":CAScodigo",$datos['CAScodigo']);
      $sql->bindParam(":TIUcodigo",$datos['TIUcodigo']);
      $sql->bindParam(":UPUcodigo",$datos['UPUcodigo']);
      $sql->bindParam(":ACTcodigoUPT",$datos['ACTcodigoUPT']);
      $sql->bindParam(":ACTnombres",$datos['ACTnombres']);
      $sql->bindParam(":ACTapellidos",$datos['ACTapellidos']);
      $sql->bindParam(":ACTDescripcion",$datos['ACTDescripcion']);
      $sql->bindParam(":ACTcelular",$datos['ACTcelular']);
      $sql->bindParam(":ACTcorreoelectronico",$datos['ACTcorreoelectronico']);
      $sql->bindParam(":ACTfecha",$datos['ACTfecha']);
      $sql->bindParam(":ACTestado",$datos['ACTestado']);
      $sql->execute();
      return $sql;
    }

    public function listar_ActividadQrsAll_modelo(){ 
      $consulta="SELECT *  FROM oevactpactividadqrs AS act
      INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
      INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
      INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
      INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
      INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo ORDER BY ACTfecha DESC";
      $conexion=modeloPrincipal::conectar();
      $datos=$conexion->query($consulta);
      $datos=$datos->fetchAll();
      return $datos;
  }
  public function listar_ActividadQrsPendientesAll_modelo(){ 
      $consulta="SELECT * FROM oevactpactividadqrs AS act
      INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
      INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
      INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
      INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
      INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo WHERE act.ACTestado=1 ORDER BY ACTfecha DESC" ;
      $conexion=modeloPrincipal::conectar();
      $datos=$conexion->query($consulta);
      $datos=$datos->fetchAll();
      return $datos;
  } 

 protected static function listar_ActividadQrsPendientes_modelo($codigo)
  {
    $consulta="SELECT * FROM oevactpactividadqrs AS act
      INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
      INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
      INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
      INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
      INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo
      INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo WHERE act.UPUcodigo=$codigo && act.ACTestado=1 ORDER BY ACTfecha DESC";
      $conexion=modeloPrincipal::conectar();
      $datos=$conexion->query($consulta);
      $datos=$datos->fetchAll();
      return $datos;
  }


  public function listar_ActividadQrsU_modelo($codigo){ 
    $consulta="SELECT * FROM oevactpactividadqrs AS act
    INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
    INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
    INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
    INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
    INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo WHERE act.UPUcodigo=$codigo ORDER BY ACTfecha DESC";
    $conexion=modeloPrincipal::conectar();
    $datos=$conexion->query($consulta);
    $datos=$datos->fetchAll();
    return $datos;
}


protected static function listar_ActividadQrsAtendidasU_modelo($codigo)
  {
    $consulta="SELECT * FROM oevactpactividadqrs AS act
      INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
      INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
      INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
      INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
      INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo
      INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo WHERE act.UPUcodigo=$codigo && act.ACTestado=2 ORDER BY ACTfecha DESC";
      $conexion=modeloPrincipal::conectar();
      $datos=$conexion->query($consulta);
      $datos=$datos->fetchAll();
      return $datos;
  }



  public function listar_ActividadQrsAtendidasAll_modelo(){ 
    $consulta="SELECT * FROM oevactpactividadqrs AS act
    INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
    INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
    INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
    INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
    INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo WHERE act.ACTestado=2 ORDER BY ACTfecha DESC";
    $conexion=modeloPrincipal::conectar();
    $datos=$conexion->query($consulta);
    $datos=$datos->fetchAll();
    return $datos;
}

    public function excel(){ 
      $consulta="SELECT * FROM oevactpactividadqrs";
    $conexion=modeloPrincipal::conectar();
    $datos=$conexion->query($consulta);
    $datos=$datos->fetchAll();
    return $datos;
    }

    public function pdf(){ 
      $consulta="SELECT * FROM oevactpactividadqrs";
    $conexion=modeloPrincipal::conectar();
    $datos=$conexion->query($consulta);
    $datos=$datos->fetchAll();
    return $datos;
    }

//ver datos de actividades QRS
protected static function Ver_actividadesQrs_Modelo($codigo)
{
  $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM oevactpactividadqrs AS act 
    INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
    INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
    INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
    INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
    INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo and act.ACTcodigo=:ACTcodigo");
  $sql->bindParam(":ACTcodigo",$codigo);
  $sql->execute();
  return $sql;
}

//ver datos de actividades pendientes All
 protected static function Ver_actividadesQrsPendientesAll_Modelo($codigo)
{
  $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM oevactpactividadqrs AS act 
    INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
    INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
    INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
    INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
    INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo
    INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo  
    WHERE act.ACTcodigo=:ACTcodigo");
  $sql->bindParam(":ACTcodigo",$codigo);
  $sql->execute();
  return $sql;
}

//ver datos de actividades pendientes
 protected static function Ver_actividadesQrsPendientes_Modelo($codigo,$codigoUsuario)
{
  $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM oevactpactividadqrs AS act 
    INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
    INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
    INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
    INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
    INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo 
    INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo 
    WHERE act.ACTcodigo=:ACTcodigo and  act.UPUcodigo=$codigoUsuario");
  $sql->bindParam(":ACTcodigo",$codigo);
  $sql->execute();
  return $sql;
}

<<<<<<< HEAD
//editar caso
   protected static function Editar_ActividadQRS_Modelo($datos)
  {

    $sql=modeloPrincipal::conectar()->prepare("UPDATE oevactpactividadqrs SET TIPcodigo=:TIPcodigo,CAScodigo=:CAScodigo,TIUcodigo=:TIUcodigo,UPUcodigo=:UPUcodigo,ACTcodigoUPT=:ACTcodigoUPT,ACTnombres=:ACTnombres,ACTapellidos=:ACTapellidos,ACTDescripcion=:ACTDescripcion,ACTcelular=:ACTcelular,ACTcorreoelectronico=:ACTcorreoelectronico,ACTfecha=:ACTfecha,ACTestado=:ACTestado WHERE ACTcodigo=:CODIGO");


      $sql->bindParam(":TIPcodigo",$datos['TIPcodigo']);
      $sql->bindParam(":CAScodigo",$datos['CAScodigo']);
      $sql->bindParam(":TIUcodigo",$datos['TIUcodigo']);
      $sql->bindParam(":UPUcodigo",$datos['UPUcodigo']);
      $sql->bindParam(":ACTcodigoUPT",$datos['ACTcodigoUPT']);
      $sql->bindParam(":ACTnombres",$datos['ACTnombres']);
      $sql->bindParam(":ACTapellidos",$datos['ACTapellidos']);
      $sql->bindParam(":ACTDescripcion",$datos['ACTDescripcion']);
      $sql->bindParam(":ACTcelular",$datos['ACTcelular']);
      $sql->bindParam(":ACTcorreoelectronico",$datos['ACTcorreoelectronico']);
      $sql->bindParam(":ACTfecha",$datos['ACTfecha']);
      $sql->bindParam(":ACTestado",$datos['ACTestado']);
   $sql->bindParam(":CODIGO",$datos['CODIGO']);
   $sql->execute();
    return $sql;
  }

=======
//ver datos de actividades atendidas
protected static function Ver_actividadesQrsAtendidas_Modelo($codigo,$codigoUsuario)
{
  $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM oevactpactividadqrs AS act 
    INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
    INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
    INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
    INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
    INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo 
    INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo 
    WHERE act.ACTestado=2 and act.ACTcodigo=:ACTcodigo and  act.UPUcodigo=$codigoUsuario");
  $sql->bindParam(":ACTcodigo",$codigo);
  $sql->execute();
  return $sql;
}
>>>>>>> 711f411d13a96f6daaa8264bcbc066b67d87623e

}