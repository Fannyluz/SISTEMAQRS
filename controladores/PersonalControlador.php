<?php
     
     if($peticionAjax){
        require_once "../modelos/PersonalModelo.php";
     }else{
        require_once "./modelos/PersonalModelo.php";
     }
  class PersonalControlador extends PersonalModelo{
      
           /*--- controlador agregar personal--*/
           public function agregar_personal_controlador(){ 

            $rolpersonal=modeloPrincipal::limpiar_cadena($_POST['rol_nombre_reg']);
            $dni=modeloPrincipal::limpiar_cadena($_POST['personal_dni_reg']);
            $nombre=modeloPrincipal::limpiar_cadena($_POST['personal_nombre_reg']);
            $apellido=modeloPrincipal::limpiar_cadena($_POST['personal_apellido_reg']);
            $foto=modeloPrincipal::limpiar_cadena($_POST['personal_foto_reg']);
            $correo=modeloPrincipal::limpiar_cadena($_POST['personal_correo_reg']);
            $celular=modeloPrincipal::limpiar_cadena($_POST['personal_celular_reg']);
            $direccion=modeloPrincipal::limpiar_cadena($_POST['personal_direccion_reg']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['personal_fecha_reg']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['personal_estado_reg']);
            

            $datos_personal_registro=[
               "ROPcodigo"=>$rolpersonal,
               "PEUDNI"=>$dni,
               "PEUnombres"=>$nombre,
               "PEUapellidos"=>$apellido,
               "PEUfoto"=>$foto,
               "PEUcorreoElectronico"=>$correo,
               "PEUcelular"=>$celular,
               "PEUdireccion"=>$direccion,
               "PEUfecha"=>$fecha,
               "PEUestado"=>$estado
            ];


            $agregar_personal = PersonalModelo::agregar_personal_modelo($datos_personal_registro);
           
            if($agregar_personal->rowCount()==1){
               
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

      /*controlador listar casos*/
      public function Listar_personal_controlador()
      {
         $datos=PersonalModelo::listar_personal_modelo();
         return $datos;
      } // fin del controlador 


       /*controlador eliminar usuario personal uptvirtual*/
        public function Eliminar_personal_ontrolador()
        {
          // recibiendo el codigo del Tipo usuario
        
           $codigo=modeloPrincipal::limpiar_cadena($_POST['rolpersonal_nombre_reg']); 
  
           // recibiendo el Tipo usuario 
           if($codigo==1){
            $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"No podemos eliminar el tipo usuario principal del sistema",
                    "Tipo"=>"error"
                 ];
                 echo json_encode($alerta);
                 exit();
           }
           // comprobar el Tipo usuario en BD
           $check_personaluptvirtual=modeloPrincipal::ejecutar_consulta_simple("SELECT ROPcodigo   FROM oevroptrolpersonal WHERE ROPcodigo='$rolpersonal'");
           if($check_personaluptvirtual->rowCount()<=0)
           {
             $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"El tipo QRS que intenta eliminar no existe en el sistema",
                    "Tipo"=>"error"
                 ];
                 echo json_encode($alerta);
                 exit();
  
           }
           
  //eliminar Tipo usuario
           $eliminar_personal=PersonalModelo::eliminar_personal_modelo($rolpersonal);
           if($eliminar_personal_modelo->rowCount()==1){
              $alerta=[
                    "Alerta"=>"recargar",
                    "Titulo"=>"Caso eliminado",
                    "Texto"=>"el tipo usuario ha sido eliminado del sistema exitosamente",
                    "Tipo"=>"success"
                 ];
           }else{
            $alerta=[
                    "Alerta"=>"simple",
                    "Titulo"=>"Ocurrio un error inesperado",
                    "Texto"=>"No hemos podido eliminar el tipo usuario, por favor intente nuevamente",
                    "Tipo"=>"error"
                 ];
  
           }
           echo json_encode($alerta);
        } // fin del controlador 

/*controlador ver  personal*/
      public function Ver_personal_controlador($codigo)
      {
         $codigo=modeloPrincipal::limpiar_cadena($codigo);
         $datos=PersonalModelo::Veer_personal_Modelo($codigo);
         return $datos;

      } // fin del controlador

     
 
}