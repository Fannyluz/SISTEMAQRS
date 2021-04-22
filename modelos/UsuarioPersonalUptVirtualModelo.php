<?php

require_once "modeloPrincipal.php";

class UsuarioPersonalUptVirtualModelo extends modeloPrincipal{
    
 /*----- Modelo agregar casos */

    protected static function agregar_usuariopersonaluptvirtual_modelo($datos){
      $sql=modeloPrincipal::conectar()->prepare("INSERT INTO oevuputusuariopersonaluptvirtual(PEUcodigo,UPUusuario,UPUclave,UPUprivilegio,UPUfecha,UPUestado) 
      VALUES(:PEUcodigo,:UPUusuario,:UPUclave,:UPUprivilegio,:UPUfecha,:UPUestado)");
      $sql->bindParam(":PEUcodigo",$datos['PEUcodigo']);
      $sql->bindParam(":UPUusuario",$datos['UPUusuario']);
      $sql->bindParam(":UPUclave",$datos['UPUclave']);
      $sql->bindParam(":UPUprivilegio",$datos['UPUprivilegio']);
      $sql->bindParam(":UPUfecha",$datos['UPUfecha']);
      $sql->bindParam(":UPUestado",$datos['UPUestado']);
      $sql->execute();
      return $sql;
    }
   
  //Listar usuario personal
  public function listar_usuariopersonaluptvirtual_modelo(){
    $consulta="SELECT * FROM oevuputusuariopersonaluptvirtual AS up 
    INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo
    INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo ";
    $conexion=modeloPrincipal::conectar();
    $datos=$conexion->query($consulta);
    $datos=$datos->fetchAll();
    return $datos;
}



//Listar usuario personal estado=activo listar_usuariopersonaluptvirtual_buscador_modelo
public function listar_usuariopersonaluptvirtual_buscador_modelo($codigo){
  $consulta="SELECT * FROM oevuputusuariopersonaluptvirtual AS up 
  INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo
  INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo WHERE UPUusuario=$codigo";
  $conexion=modeloPrincipal::conectar();
  $datos=$conexion->query($consulta);
  $datos=$datos->fetchAll();
  return $datos;
}





//Listar usuario personal estado=activo
  public function listar_usuariopersonaluptvirtual_estado_modelo(){
    $consulta="SELECT * FROM oevuputusuariopersonaluptvirtual AS up 
    INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo
    INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo WHERE UPUestado=1";
    $conexion=modeloPrincipal::conectar();
    $datos=$conexion->query($consulta);
    $datos=$datos->fetchAll();
    return $datos;
}

  //
    /*controlador obtener usuario _codigo para asi poder obtener la informacion para el formario de agregar actividad qrs personal*/
  public function Obtener_usuariopersonaluptvirtual_modelo($codigo){
      $consulta="SELECT * FROM oevuputusuariopersonaluptvirtual AS up 
      INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo
      INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo WHERE up.PEUcodigo=$codigo";
      $conexion=modeloPrincipal::conectar();
      $datos=$conexion->query($consulta);
      $datos=$datos->fetchAll();
      return $datos;
  }
  protected static function eliminar_usuariopersonaluptvirtual_modelo($codigo)
  {
    $sql=modeloPrincipal::conectar()->prepare("DELETE FROM oevuputusuariopersonaluptvirtual WHERE UPUcodigo=:UPUcodigo");
    $sql->bindParam(":UPUcodigo",$codigo);
    $sql->execute();
    return $sql;
  }
 //datos del usuario personal de la oficina
   protected static function Ver_usuariopersonaluptvirtual_Modelo($codigo)
  {

    $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM oevuputusuariopersonaluptvirtual AS up
     INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo 
     INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo WHERE  up.UPUcodigo=:UPUcodigo");
    $sql->bindParam(":UPUcodigo",$codigo);
    $sql->execute();
    return $sql;
  }
  //editar usuario personal de la oficina
   protected static function Editar_usuariopersonaluptvirtual_Modelo($datos)
  {

    $sql=modeloPrincipal::conectar()->prepare("UPDATE oevuputusuariopersonaluptvirtual SET PEUcodigo=:PEUcodigo,UPUusuario=:UPUusuario,UPUclave=:UPUclave,UPUprivilegio=:UPUprivilegio,UPUfecha=:UPUfecha,UPUestado=:UPUestado WHERE UPUcodigo =:CODIGO");

   $sql->bindParam(":PEUcodigo",$datos['PEUcodigo']);
   $sql->bindParam(":UPUusuario",$datos['UPUusuario']);
   $sql->bindParam(":UPUclave",$datos['UPUclave']);
   $sql->bindParam(":UPUprivilegio",$datos['UPUprivilegio']);
   $sql->bindParam(":UPUfecha",$datos['UPUfecha']);
   $sql->bindParam(":UPUestado",$datos['UPUestado']);
   $sql->bindParam(":CODIGO",$datos['CODIGO']);
   $sql->execute();
    return $sql;
  }


  //cambiar contraseña
  protected static function Cambiar_usuariopersonaluptvirtual_Modelo($datos)
  {

    $sql=modeloPrincipal::conectar()->prepare("UPDATE oevuputusuariopersonaluptvirtual SET UPUusuario=:UPUusuario,UPUclave=:UPUclave WHERE UPUcodigo =:CODIGO");

   
   $sql->bindParam(":UPUusuario",$datos['UPUusuario']);
   $sql->bindParam(":UPUclave",$datos['UPUclave']);
 
   $sql->bindParam(":CODIGO",$datos['CODIGO']);
   $sql->execute();
    return $sql;
  }


 }