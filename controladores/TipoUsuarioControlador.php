<?php
     
     if($peticionAjax){
        require_once "../modelos/TipoUsuarioModelo.php";
     }else{
        require_once "./modelos/TipoUsuarioModelo.php";
     }


     class TipoUsuarioControlador extends TipoUsuarioModelo{
      
           /*--- controlador agregar usuario--*/
           public function agregar_tipousuario_controlador(){

            $nombre=modeloPrincipal::limpiar_cadena($_POST['tipousuario_nombre_reg']);
            $descripcion=modeloPrincipal::limpiar_cadena($_POST['tipousuario_descripcion_reg']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['tipousuario_fecha_reg']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['tipousuario_estado_reg']);


            //comprobar campos vacios
            if($nombre=="" || $descripcion==""){
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
            $check_nombretipousuario=modeloPrincipal::ejecutar_consulta_simple("SELECT Nombre FROM tipousuario WHERE Nombre='$nombre'");
            if($check_nombretipousuario->rowCount()>0){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"Existe un caso registrado con el mismo nombre, por favor registre un caso diferente",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
            }


            $datos_tipousuario_registro=[
               "Nombre"=>$nombre,
               "Descripcion"=>$descripcion,
               "Fecha"=>$fecha,
               "Estado"=>$estado
            ];


            $agregar_tipousuario = TipoUsuarioModelo::agregar_tipousuario_modelo($datos_tipousuario_registro);
           
            if($agregar_tipousuario->rowCount()==1){
               
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
      public function Listar_tipousuario_controlador()
      {
         $datos=TipoUsuarioModelo::listar_tipousuario_modelo();
         return $datos;
      } // fin del controlador 



        /*controlador eliminar Tipo usuario*/
        public function Eliminar_tipousuario_controlador()
        {
          // recibiendo el codigo del Tipo usuario
        
           $codigo=modeloPrincipal::limpiar_cadena($_POST['tipousuario_codigo_del']);
  
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
           $check_tipousuario=modeloPrincipal::ejecutar_consulta_simple("SELECT CodTipoUsuario  FROM tipousuario WHERE CodTipoUsuario='$codigo'");
           if($check_tipousuario->rowCount()<=0)
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
           $eliminar_tipousuario=TipoUsuarioModelo::eliminar_tipousuario_modelo($codigo);
           if($eliminar_tipousuario->rowCount()==1){
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

        

     }