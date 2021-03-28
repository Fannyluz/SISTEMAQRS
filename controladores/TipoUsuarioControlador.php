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
            $check_nombretipousuario=modeloPrincipal::ejecutar_consulta_simple("SELECT TIUnombre FROM oevtiuttipousuario WHERE TIUnombre='$nombre'");
            if($check_nombretipousuario->rowCount()>0){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"Existe un Tipo de Usuario registrado con el mismo nombre, por favor registre un caso diferente",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
            }


            $datos_tipousuario_registro=[
               "TIUnombre"=>$nombre,
               "TIUdescripcion"=>$descripcion,
               "TIUfecha"=>$fecha,
               "TIUestado"=>$estado
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

/*controlador listar casos estado=1*/
      public function Listar_tipousuario_estado_controlador()
      {
         $datos=TipoUsuarioModelo::listar_tipousuario_estado_modelo();
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
           $check_tipousuario=modeloPrincipal::ejecutar_consulta_simple("SELECT TIUcodigo  FROM oevtiuttipousuario WHERE TIUcodigo='$codigo'");
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
           
           // comprobar el Tipo usuario existe en las actividades registradas
           $check_tipousuario_actividadQRS=modeloPrincipal::ejecutar_consulta_simple("SELECT TIUcodigo  FROM oevactpactividadqrs WHERE TIUcodigo='$codigo' LIMIT 1");
           if($check_tipousuario_actividadQRS->rowCount()>0)
           {
             $alerta=[
                    "Alerta"=>"simple",
                   "Titulo"=>"Ocurrio un error inesperado",
                   "Texto"=>"No podemos eliminar este tipo de usuario(Emisor), debido a que actividades asociados, recomendamos deshabilitar el tipo usuario si ya no sera usado en el sistema",
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

        
        /*mostrar datos del tipo qrs */
      public function Ver_tipousuario_controlador($codigo)
      {
        $codigo=modeloPrincipal::limpiar_cadena($codigo);
        $codigodesencriptado=modeloPrincipal::decryption($codigo);
         $datos=TipoUsuarioModelo::Ver_tipousuario_Modelo($codigodesencriptado);
         return $datos;

      } // fin del controlador 


/*controlador editar caso*/
      public function Editar_tipousuario_controlador()
      {
        //recuperar el codigo
      
    $codigo=modeloPrincipal::limpiar_cadena($_POST['tipoUsuario_codigo_up']);
    $codigodesencriptado=modeloPrincipal::decryption($codigo);
           //comprobar caso en la base de datos
        $check_tipoUsuario=modeloPrincipal::ejecutar_consulta_simple("SELECT * FROM oevtiuttipousuario WHERE TIUcodigo='$codigodesencriptado'");

        if($check_tipoUsuario->rowCount()<=0){
            $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No hemos encontrado el caso en el sistema",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);
               exit();
        }else
        {
          $campos=$check_tipoUsuario->fetch();
        }


           $nombre=modeloPrincipal::limpiar_cadena($_POST['tipousuario_nombre_up']);
            $descripcion=modeloPrincipal::limpiar_cadena($_POST['tipousuario_descripcion_up']);
            $fecha=modeloPrincipal::limpiar_cadena($_POST['tipousuario_fecha_up']);
            $estado=modeloPrincipal::limpiar_cadena($_POST['tipousuario_estado_up']);

 //comprobar campos vacios
            if($nombre==""){
               $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"No has llenado todos los campos obligatorios",
                  "Tipo"=>"error"
               ];
               echo json_encode($alerta);

               exit();
            } 



            $datos_tipoUsuario_update=[
               "TIUnombre"=>$nombre,
               "TIUdescripcion"=>$descripcion,
               "TIUfecha"=>$fecha,
               "TIUestado"=>$estado,
               "CODIGO"=>$codigodesencriptado
            ];

         if(TipoUsuarioModelo::Editar_tipousuario_Modelo($datos_tipoUsuario_update)){
          $alerta=[
                  "Alerta"=>"recargar",
                  "Titulo"=>"Tipo Usuari-Emisor Actualizado",
                  "Texto"=>"los datos se actualizaron correctamente",
                  "Tipo"=>"success"
               ];
            }else{
              $alerta=[
                  "Alerta"=>"simple",
                  "Titulo"=>"Ocurrio un error inesperado",
                  "Texto"=>"no hemos podido actualizar los datos, por favor intente nuevamente",
                  "Tipo"=>"error"
               ];
               
            }
      
          echo json_encode($alerta);

      } // fin del controlador 


     }