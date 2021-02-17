<?php

require_once "modeloPrincipal.php";

class CasoModelo extends modeloPrincipal{

        public $CodCaso ;
        public $Nombre;
        public $Descripcion;
        public $Fecha;
        public $Estado;


        private $db;
        private $casos;
    
 /*----- Modelo agregar casos */

 public function __construct(){
  
  $this->casos=array();
}


    protected static function agregar_caso_modelo($datos){
      $sql=modeloPrincipal::conectar()->prepare("INSERT INTO caso(Nombre,Descripcion,Fecha,Estado) 
      VALUES(:Nombre,:Descripcion,:Fecha,:Estado)");
      $sql->bindParam(":Nombre",$datos['Nombre']);
      $sql->bindParam(":Descripcion",$datos['Descripcion']);
      $sql->bindParam(":Fecha",$datos['Fecha']);
      $sql->bindParam(":Estado",$datos['Estado']);
      $sql->execute();
      return $sql;
    }
    public function listar_casos_modelo(){
     
     
      $consulta="SELECT * FROM caso";
      $conexion=modeloPrincipal::conectar();
      $datos=$conexion->query($consulta);
      $datos=$datos->fetchAll();
      return $datos;
      
  }




 }