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
   // public function listar_usuariopersonaluptvirtual_modelo(){
     // $consulta="SELECT * FROM oevuputusuariopersonaluptvirtual 
    //  INNER JOIN oevpeutpersonaluptvirtual 
     // ON oevuputusuariopersonaluptvirtual.PEUcodigo=oevpeutpersonaluptvirtual.PEUcodigo";
     // $conexion=modeloPrincipal::conectar();
     // $datos=$conexion->query($consulta);
     // $datos=$datos->fetchAll();
     // return $datos;
 // }

  //probar 
  public function listar_usuariopersonaluptvirtual_modelo(){
    $consulta="SELECT * FROM oevuputusuariopersonaluptvirtual AS up 
    INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo
    INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo ";
    $conexion=modeloPrincipal::conectar();
    $datos=$conexion->query($consulta);
    $datos=$datos->fetchAll();
    return $datos;
}

  //
 
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


 }