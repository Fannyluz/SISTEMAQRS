<?php
     
     if($peticionAjax){
        require_once "../modelos/RolModelo.php";
     }else{
        require_once "./modelos/RolModelo.php";
     }


     class RolControlador extends RolModelo{
      
           /*--- controlador agregar usuario--*/
           public function agregar_rol_controlador(){
            
            $nombre=modeloPrincipal::limpiar_cadena($_POST['rol_nombre_reg']);
            $descripcion=modeloPrincipal::limpiar_cadena($_POST['rol_descripcion_reg']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['rol_fecha_reg']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['rol_estado_reg']);


            //comprobar campos vacios
            if($nombre=="" || $fecha=="" || $estado==""){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No has llenado todos los campos obligatorios",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);

               exit();
            }     
            
            //comprobar el nombre
            $check_codRol=modeloPrincipal::ejecutar_consulta_simple("SELECT ROPnombre FROM oevroptrolpersonal WHERE ROPnombre='$nombre'");
            if($check_codRol->rowCount()>0){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"Existe un rol registrado con el mismo nombre, por favor registre un rol diferente",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
            }


            $datos_rol_registro=[
               
               "ROPnombre"=>$nombre,
               "ROPdescripcion"=>$descripcion,
               "ROPfecha"=>$fecha,
               "ROPestado"=>$estado
            ];


            $agregar_rol = RolModelo::agregar_rol_modelo($datos_rol_registro);
           
            if($agregar_rol->rowCount()==1){
               
               $alerta=[
                  "Alerta"=>"Limpiar",
                  "Titulo"=>"Caso registrado",
                  "Texto"=>"Se registro los datos correctamente",
                  "Tipo"=>"success"
               ];
            }else {
         
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No hemos podido registrar el caso",
                  "Tipo"=>"error"
               ];
            }
            
            echo json_encode($alerta);
      } // fin del controlador 

      /*controlador listar personales de la oficina de educación virtual*/
      public function Listar_rol_controlador()
      {
         $datos=RolModelo::listar_rol_modelo();
         return $datos;
      } // fin del controlador 

  /*controlador datos del caso*/
  public function Ver_rol_controlador($codigo)
  {
    $codigo=modeloPrincipal::limpiar_cadena($codigo);
     $datos=RolModelo::Ver_Rol_Modelo($codigo);
     return $datos;

  } // fin del controlador

      
     }