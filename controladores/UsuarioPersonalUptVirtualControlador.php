<?php
     
     if($peticionAjax){
        require_once "../modelos/UsuarioPersonalUptVirtualModelo.php";
     }else{
        require_once "./modelos/UsuarioPersonalUptVirtualModelo.php";
     }
  class UsuarioPersonalUptVirtualControlador extends UsuarioPersonalUptVirtualModelo{
      
           /*--- controlador agregar usuario--*/
           public function agregar_usuariopersonaluptvirtual_controlador(){

            $personaluptvirtual=modeloPrincipal::limpiar_cadena($_POST['personaluptvirtual_reg']);
            $usuario=modeloPrincipal::limpiar_cadena($_POST['usuario_reg']);
            $clave=modeloPrincipal::limpiar_cadena($_POST['clave_reg']);
            $privilegio=modeloPrincipal::limpiar_cadena($_POST['privilegio_reg']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['fecha_reg']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['estado_reg']);
            


            $datos_usuariopersonaluptvirtual_registro=[
               "PEUcodigo"=>$personaluptvirtual,
               "UPUusuario"=>$usuario,
               "UPUclave"=>$clave,
               "UPUprivilegio"=>$privilegio,
               "UPUfecha"=>$fecha,
               "UPUestado"=>$estado
            ];


            $agregar_usuariopersonaluptvirtual = UsuarioPersonalUptVirtualModelo::agregar_usuariopersonaluptvirtual_modelo($datos_usuariopersonaluptvirtual_registro);
           
            if($agregar_usuariopersonaluptvirtual->rowCount()==1){
               
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
      public function Listar_usuariopersonaluptvirtual_controlador() 
      {
         $datos=UsuarioPersonalUptVirtualModelo::listar_usuariopersonaluptvirtual_modelo();
         return $datos;
      } // fin del controlador 

      /*controlador obtener usuario _codigo para asi poder obtener la informacion para el formario de agregar actividad qrs personal*/
         public function Obtener_usuariopersonaluptvirtual_controlador()
      {
        $codigo=$_SESSION['personal_spm'];
        $datos=UsuarioPersonalUptVirtualModelo::Obtener_usuariopersonaluptvirtual_modelo($codigo);
         return $datos;
        
      } // fin del controlador 

       /*controlador eliminar usuario personal uptvirtual*/
        public function Eliminar_usuariopersonaluptvirtual_ontrolador()
        {
          // recibiendo el codigo del Tipo usuario
        
           $codigo=modeloPrincipal::limpiar_cadena($_POST['usuariopersonaluptvirtual_codigo_del']);
  
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
           $check_usuariopersonaluptvirtual=modeloPrincipal::ejecutar_consulta_simple("SELECT UPUcodigo  FROM oevuputusuariopersonaluptvirtual WHERE UPUcodigo='$codigo'");
           if($check_usuariopersonaluptvirtual->rowCount()<=0)
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
           $eliminar_usuariopersonaluptvirtual=UsuarioPersonalUptVirtualModelo::eliminar_usuariopersonaluptvirtual_modelo($codigo);
           if($eliminar_usuariopersonaluptvirtual->rowCount()==1){
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

/*mostrar informacion detallada del usuario personal de la oficina */
      public function Ver_usuariopersonaluptvirtual_controlador($codigo)
      {
        $codigo=modeloPrincipal::limpiar_cadena($codigo);
         $datos=UsuarioPersonalUptVirtualModelo::Ver_usuariopersonaluptvirtual_Modelo($codigo);
         return $datos;

      } // fin del controlador 

}