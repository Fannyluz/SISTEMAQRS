<?php

require_once "modeloPrincipal.php";

class CasoModelo extends modeloPrincipal{
    
 /*----- Modelo agregar casos */

    protected static function agregar_caso_modelo($datos){
      $sql=modeloPrincipal::conectar()->prepare("INSERT INTO oevcastcaso(CASnombre,CASdescripcion,CASfecha,CASestado) 
      VALUES(:CASnombre,:CASdescripcion,:CASfecha,:CASestado)");
      $sql->bindParam(":CASnombre",$datos['CASnombre']);
      $sql->bindParam(":CASdescripcion",$datos['CASdescripcion']);
      $sql->bindParam(":CASfecha",$datos['CASfecha']);
      $sql->bindParam(":CASestado",$datos['CASestado']);
      $sql->execute();
      return $sql;
    }
    public function listar_casos_modelo(){
      $consulta="SELECT * FROM oevcastcaso ORDER BY CASfecha DESC";
      $conexion=modeloPrincipal::conectar();
      $datos=$conexion->query($consulta);
      $datos=$datos->fetchAll();
      return $datos;
      
  }
//estado =activo
  public function listar_casos_estado_modelo(){
      $consulta="SELECT * FROM oevcastcaso WHERE CASestado=1";
      $conexion=modeloPrincipal::conectar();
      $datos=$conexion->query($consulta);
      $datos=$datos->fetchAll();
      return $datos;
      
  }

  protected static function eliminar_caso_modelo($codigo)
  {
    $sql=modeloPrincipal::conectar()->prepare("DELETE FROM oevcastcaso WHERE  CAScodigo=:CAScodigo");
    $sql->bindParam(":CAScodigo",$codigo);
    $sql->execute();
    return $sql;
  }

  /*protected function buscar_fecha($fecha_desde, $fecha_hasta)
  {
    $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM oevcastcaso WHERE  CASfecha BETWEEN "'.$fecha_desde.'" AND "'.$fecha_hasta.'" ");
    $conexion=modeloPrincipal::conectar();
      $datos=$conexion->query($consulta);
      $datos=$datos->fetchAll();
      return $datos;
  } vamos a ver XD */

  function fechaNormal($fecha){
		$nfecha = date('d/m/Y',strtotime($fecha));
		return $nfecha;
	}

  public function allBitacora(){
    try{
      $pdo = AccesoDB::getConnectionPDO();
      
      $sql = 'SELECT * FROM oevcastcaso ORDER BY CAScodigo DESC';
      
      $stmt = $pdo->query($sql);
      $stmt->execute();
      
      $return = $stmt->fetchAll();
      return $return;
      
    } catch (Exception $e){
      throw $e;
    }	
  }

  public function buscarAllBitacoraFecha($desde,$hasta){
    try{
      $pdo = AccesoDB::getConnectionPDO();
      
      $sql = 'SELECT * FROM oevcastcaso WHERE CASfecha BETWEEN "'.$desde.'" AND "'.$hasta.'" ORDER BY CAScodigo DESC';
      
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      
      $return = $stmt->fetchAll();
      return $return;
      
    } catch (Exception $e){
      throw $e;
    }	
  }
//datos del caso
   protected static function Ver_Caso_Modelo($codigo)
  {

    $sql=modeloPrincipal::conectar()->prepare("SELECT * FROM oevcastcaso WHERE  CAScodigo=:CAScodigo");
    $sql->bindParam(":CAScodigo",$codigo);
    $sql->execute();
    return $sql;
  }

//editar caso 
   protected static function Editar_Caso_Modelo($datos)
  {

    $sql=modeloPrincipal::conectar()->prepare("UPDATE oevcastcaso SET CASnombre=:CASnombre,CASdescripcion=:CASdescripcion,CASfecha=:CASfecha,CASestado=:CASestado WHERE CAScodigo=:CODIGO");

   $sql->bindParam(":CASnombre",$datos['CASnombre']);
   $sql->bindParam(":CASdescripcion",$datos['CASdescripcion']);
   $sql->bindParam(":CASfecha",$datos['CASfecha']);
   $sql->bindParam(":CASestado",$datos['CASestado']);
   $sql->bindParam(":CODIGO",$datos['CODIGO']);
   $sql->execute();
    return $sql;
  }

 }
 ?>