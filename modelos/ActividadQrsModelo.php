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
      $consulta="SELECT * FROM oevactpactividadqrs AS act
      INNER JOIN oevcastcaso AS c ON act.CAScodigo=c.CAScodigo
      INNER JOIN oevtipttipoqrs AS tq ON act.TIPcodigo=tq.TIPcodigo
      INNER JOIN oevtiuttipousuario AS tu ON act.TIUcodigo=tu.TIUcodigo
      INNER JOIN oevuputusuariopersonaluptvirtual AS up ON act.UPUcodigo=up.UPUcodigo
      INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo";
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
      INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo WHERE act.ACTestado=1";
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
      INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo WHERE act.UPUcodigo=$codigo";
      $conexion=modeloPrincipal::conectar();
      $datos=$conexion->query($consulta);
      $datos=$datos->fetchAll();
      return $datos;
  }


 }