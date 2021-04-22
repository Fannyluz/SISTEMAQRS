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
      ROPcodigo,PEUDNI,PEUnombres,PEUapellidos,PEUfoto,PEUcorreoElectronico,PEUcelular,PEUdireccion,PEUfecha,PEUestado) 
      VALUES(:ROPcodigo,:PEUDNI,:PEUnombres,:PEUapellidos,:PEUfoto, :PEUcorreoElectronico,:PEUcelular,:PEUdireccion,:PEUfecha,:PEUestado)");
      
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
        $consulta="SELECT * FROM oevpeutpersonaluptvirtual AS pu 
        INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo  ORDER BY PEUfecha DESC";
        
        $conexion=modeloPrincipal::conectar();
        $datos=$conexion->query($consulta);
        $datos=$datos->fetchAll();
        return $datos;
        
    }
    //LISTAR ESTADO =ACTIVO
    public function listar_personal_Estado_modelo(){
        $consulta="SELECT * FROM oevpeutpersonaluptvirtual AS pu 
        INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo WHERE PEUestado=1";
        $conexion=modeloPrincipal::conectar();
        $datos=$conexion->query($consulta);
        $datos=$datos->fetchAll();
        return $datos;
        
    }
    //eliminar
 
    protected static function eliminar_personal_modelo($codigo)
  {
    $sql=modeloPrincipal::conectar()->prepare("DELETE FROM oevpeutpersonaluptvirtual WHERE PEUcodigo=:PEUcodigo");
    $sql->bindParam(":PEUcodigo",$codigo);
    $sql->execute();
    return $sql;
  }

    //ver personal PROBAR
    //ver datos de actividades QRS
protected static function Ver_Personal_Modelo($codigo)
{
  $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM oevpeutpersonaluptvirtual AS pu 
  INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo");
  $sql->bindParam(":PEUcodigo",$codigo);
  $imagenes = $con->get_imagenes();
  $sql->execute();
  return $sql;
}




protected static function Veer_personal_Modelo($codigo)
  {

    $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM oevpeutpersonaluptvirtual AS pu 
  INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo 
  WHERE PEUcodigo=:PEUcodigo");
    $sql->bindParam(":PEUcodigo",$codigo);
    $sql->execute();
    return $sql;
  }


  protected static function Veer_perfil_Modelo($codigo)
  {
    $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM oevuputusuariopersonaluptvirtual AS up
    INNER JOIN oevpeutpersonaluptvirtual AS pu ON up.PEUcodigo=pu.PEUcodigo 
    INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo WHERE up.UPUcodigo=:UPUcodigo");
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
  /////////////////////////////////////////////////


 

  protected static function Veer_imagen_Modelo($codigo)
  {

    $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM oevpeutpersonaluptvirtual AS pu 
  INNER JOIN oevroptrolpersonal AS rl ON pu.ROPcodigo=rl.ROPcodigo 
  WHERE PEUcodigo=:PEUcodigo");
    $sql->bindParam(":PEUcodigo",$codigo);
    $sql->execute();
    return $sql;
  }
  //editar personal de la oficina
  protected static function Editar_Personal_Modelo($datos)
  {

    $sql=modeloPrincipal::conectar()->prepare("UPDATE oevpeutpersonaluptvirtual SET ROPcodigo=:ROPcodigo, PEUDNI=:PEUDNI,
    PEUnombres=:PEUnombres, PEUapellidos=:PEUapellidos,PEUfoto=:PEUfoto, PEUcorreoElectronico=:PEUcorreoElectronico, PEUcelular=:PEUcelular,
    PEUdireccion=:PEUdireccion, PEUfecha=:PEUfecha, PEUestado=:PEUestado WHERE PEUcodigo=:CODIGO");

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
   $sql->bindParam(":CODIGO",$datos['CODIGO']);
   $sql->execute();
    return $sql;
  }
 }